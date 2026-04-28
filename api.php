<?php
// ============================================
// API for E-Shopper Project
// Database: progect
// ============================================

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// ============================================
// Database Connection
// ============================================
$host = "localhost";
$db   = "progect";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// ============================================
// Get Request Method and Endpoint
// ============================================
$method = $_SERVER['REQUEST_METHOD'];
$request = isset($_GET['endpoint']) ? $_GET['endpoint'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// ============================================
// ROUTING
// ============================================

// ----------------------------
// ENDPOINT 1: GET all products
// GET api.php?endpoint=products
// ----------------------------
if ($method == "GET" && $request == "products" && !$id) {
    $sql = "SELECT p.id, p.name, p.price, p.image, p.count, p.des, 
                   b.name as brand, c.name as category 
            FROM products p 
            JOIN brand b ON p.brand = b.id 
            JOIN cat c ON p.cat = c.id";
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode([
        "status" => "success",
        "count" => count($products),
        "data" => $products
    ]);
}

// ----------------------------
// ENDPOINT 2: GET single product
// GET api.php?endpoint=products&id=9
// ----------------------------
elseif ($method == "GET" && $request == "products" && $id) {
    $sql = "SELECT p.id, p.name, p.price, p.image, p.count, p.des, 
                   b.name as brand, c.name as category 
            FROM products p 
            JOIN brand b ON p.brand = b.id 
            JOIN cat c ON p.cat = c.id
            WHERE p.id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo json_encode([
            "status" => "success",
            "data" => $result->fetch_assoc()
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Product not found"]);
    }
}

// ----------------------------
// ENDPOINT 3: POST add new product
// POST api.php?endpoint=products
// Body: {"name":"iPhone","price":50000,"image":"img.jpg","count":10,"des":"desc","brand":1,"cat":1}
// ----------------------------
elseif ($method == "POST" && $request == "products") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['name'], $data['price'], $data['image'], $data['count'], $data['des'], $data['brand'], $data['cat'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $name  = $conn->real_escape_string($data['name']);
    $price = intval($data['price']);
    $image = $conn->real_escape_string($data['image']);
    $count = intval($data['count']);
    $des   = $conn->real_escape_string($data['des']);
    $brand = intval($data['brand']);
    $cat   = intval($data['cat']);

    $sql = "INSERT INTO products (name, price, image, count, des, brand, cat) 
            VALUES ('$name', $price, '$image', $count, '$des', $brand, $cat)";

    if ($conn->query($sql)) {
        echo json_encode([
            "status" => "success",
            "message" => "Product added successfully",
            "id" => $conn->insert_id
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

// ----------------------------
// ENDPOINT 4: PUT update product
// PUT api.php?endpoint=products&id=9
// Body: {"name":"iPhone","price":60000,"image":"img.jpg","count":5,"des":"desc","brand":1,"cat":1}
// ----------------------------
elseif ($method == "PUT" && $request == "products" && $id) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['name'], $data['price'], $data['image'], $data['count'], $data['des'], $data['brand'], $data['cat'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $name  = $conn->real_escape_string($data['name']);
    $price = intval($data['price']);
    $image = $conn->real_escape_string($data['image']);
    $count = intval($data['count']);
    $des   = $conn->real_escape_string($data['des']);
    $brand = intval($data['brand']);
    $cat   = intval($data['cat']);

    $sql = "UPDATE products SET 
                name='$name', price=$price, image='$image', 
                count=$count, des='$des', brand=$brand, cat=$cat 
            WHERE id=$id";

    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo json_encode(["status" => "success", "message" => "Product updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Product not found or no changes made"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

// ----------------------------
// ENDPOINT 5: DELETE product
// DELETE api.php?endpoint=products&id=9
// ----------------------------
elseif ($method == "DELETE" && $request == "products" && $id) {
    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo json_encode(["status" => "success", "message" => "Product deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Product not found"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

// ----------------------------
// ENDPOINT 6: GET all categories
// GET api.php?endpoint=categories
// ----------------------------
elseif ($method == "GET" && $request == "categories") {
    $result = $conn->query("SELECT * FROM cat");
    $cats = [];
    while ($row = $result->fetch_assoc()) {
        $cats[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $cats]);
}

// ----------------------------
// ENDPOINT 7: GET all brands
// GET api.php?endpoint=brands
// ----------------------------
elseif ($method == "GET" && $request == "brands") {
    $result = $conn->query("SELECT * FROM brand");
    $brands = [];
    while ($row = $result->fetch_assoc()) {
        $brands[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $brands]);
}

// ----------------------------
// ENDPOINT 8: GET products by category
// GET api.php?endpoint=products-by-cat&id=1
// ----------------------------
elseif ($method == "GET" && $request == "products-by-cat" && $id) {
    $sql = "SELECT p.id, p.name, p.price, p.image, p.count, p.des, 
                   b.name as brand, c.name as category 
            FROM products p 
            JOIN brand b ON p.brand = b.id 
            JOIN cat c ON p.cat = c.id
            WHERE p.cat = $id";
    $result = $conn->query($sql);
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode([
        "status" => "success",
        "count" => count($products),
        "data" => $products
    ]);
}

// ----------------------------
// Invalid endpoint
// ----------------------------
else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid endpoint or method",
        "available_endpoints" => [
            "GET api.php?endpoint=products" => "Get all products",
            "GET api.php?endpoint=products&id=9" => "Get single product",
            "POST api.php?endpoint=products" => "Add new product",
            "PUT api.php?endpoint=products&id=9" => "Update product",
            "DELETE api.php?endpoint=products&id=9" => "Delete product",
            "GET api.php?endpoint=categories" => "Get all categories",
            "GET api.php?endpoint=brands" => "Get all brands",
            "GET api.php?endpoint=products-by-cat&id=1" => "Get products by category"
        ]
    ]);
}

$conn->close();
?>
