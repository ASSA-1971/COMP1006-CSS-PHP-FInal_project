<?php
// crud operations for products and admin users
// building this based on week 4-9 lessons

class Crud {
  private $conn;
  
  public function __construct($db) {
    $this->conn = $db;
  }
  
  // create new product
  public function createProduct($name, $categoryId, $price, $description, $img) {
    try {
      $query = "INSERT INTO products (name, category_id, price, description, img) 
                VALUES (:name, :cat_id, :price, :desc, :img)";
      
      $stmt = $this->conn->prepare($query);
      
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':cat_id', $categoryId);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':desc', $description);
      $stmt->bindParam(':img', $img);
      
      if($stmt->execute()) {
        return true;
      }
      return false;
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
      return false;
    }
  }
  
  // read all products
  public function readProducts() {
    $query = "SELECT p.*, c.name as category_name 
              FROM products p 
              LEFT JOIN categories c ON p.category_id = c.id 
              ORDER BY p.created_at DESC";
    
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    
    return $stmt;
  }
  
  // read single product by id
  public function readSingleProduct($id) {
    $query = "SELECT p.*, c.name as category_name 
              FROM products p 
              LEFT JOIN categories c ON p.category_id = c.id 
              WHERE p.id = :id";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  // update product
  public function updateProduct($id, $name, $categoryId, $price, $description, $img = null) {
    // if image provided update it, otherwise keep old one
    if($img) {
      $query = "UPDATE products 
                SET name = :name, category_id = :cat_id, price = :price, 
                    description = :desc, img = :img 
                WHERE id = :id";
    } else {
      $query = "UPDATE products 
                SET name = :name, category_id = :cat_id, price = :price, 
                    description = :desc 
                WHERE id = :id";
    }
    
    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':cat_id', $categoryId);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':desc', $description);
    
    if($img) {
      $stmt->bindParam(':img', $img);
    }
    
    return $stmt->execute();
  }
  
  // delete product
  public function deleteProduct($id) {
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    
    return $stmt->execute();
  }
  
  // create admin user with hashed password
  public function createAdmin($email, $password) {
    // check if email already exists
    $checkQuery = "SELECT id FROM admin_users WHERE email = :email";
    $checkStmt = $this->conn->prepare($checkQuery);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();
    
    if($checkStmt->rowCount() > 0) {
      return ['success' => false, 'message' => 'Email already exists'];
    }
    
    // hash password using password_hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO admin_users (email, password) VALUES (:email, :pass)";
    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $hashedPassword);
    
    if($stmt->execute()) {
      return ['success' => true, 'message' => 'Admin created'];
    }
    
    return ['success' => false, 'message' => 'Failed to create admin'];
  }
  
  // verify admin login
  public function verifyAdmin($email, $password) {
    $query = "SELECT * FROM admin_users WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    if($stmt->rowCount() == 1) {
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // verify password using password_verify
      if(password_verify($password, $user['password'])) {
        return ['success' => true, 'user' => $user];
      }
    }
    
    return ['success' => false, 'message' => 'Invalid credentials'];
  }
  
  // get categories for dropdown
  public function getCategories() {
    $query = "SELECT * FROM categories ORDER BY name";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    
    return $stmt;
  }
}
?>