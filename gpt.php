To implement these SQL scripts into PHP, you can use the PDO (PHP Data Objects) extension, which provides a consistent interface for accessing databases in PHP. Below is a complete example that demonstrates how to create the tables and insert initial demo data using PDO in PHP.

### Database Connection

First, set up a database connection using PDO.

```php
<?php
$host = 'localhost';
$db = 'your_database_name';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
```

### Create Tables and Insert Data

Next, create the tables and insert the initial demo data.

```php
<?php
// Create tables
$createTablesSql = "
CREATE TABLE RnDEmployee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    sitting_location VARCHAR(100) NOT NULL,
    work_days VARCHAR(255) NOT NULL,
    employment_start_date DATE NOT NULL,
    employment_end_date DATE
);

CREATE TABLE Developer (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES RnDEmployee(id)
);

CREATE TABLE Tester (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES RnDEmployee(id)
);

CREATE TABLE SystemAdmin (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES RnDEmployee(id)
);
";

$pdo->exec($createTablesSql);

// Insert initial demo data
$insertRnDEmployeeSql = "
INSERT INTO RnDEmployee (name, position, salary, sitting_location, work_days, employment_start_date, employment_end_date) VALUES
(:name, :position, :salary, :sitting_location, :work_days, :employment_start_date, :employment_end_date)
";

$employees = [
    ['name' => 'John Doe', 'position' => 'Senior Developer', 'salary' => 90000.00, 'sitting_location' => 'Building A', 'work_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday', 'employment_start_date' => '2024-01-01', 'employment_end_date' => null],
    ['name' => 'Jane Smith', 'position' => 'QA Tester', 'salary' => 75000.00, 'sitting_location' => 'Building B', 'work_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday', 'employment_start_date' => '2023-02-15', 'employment_end_date' => null],
    ['name' => 'Alice Johnson', 'position' => 'System Administrator', 'salary' => 85000.00, 'sitting_location' => 'Building C', 'work_days' => 'Monday,Tuesday,Wednesday,Thursday,Friday', 'employment_start_date' => '2022-03-20', 'employment_end_date' => null]
];

$stmt = $pdo->prepare($insertRnDEmployeeSql);

foreach ($employees as $employee) {
    $stmt->execute($employee);
}

// Insert into specific role tables
$developerId = $pdo->lastInsertId();
$pdo->exec("INSERT INTO Developer (id) VALUES ($developerId)");

$testerId = $pdo->lastInsertId();
$pdo->exec("INSERT INTO Tester (id) VALUES ($testerId)");

$systemAdminId = $pdo->lastInsertId();
$pdo->exec("INSERT INTO SystemAdmin (id) VALUES ($systemAdminId)");

echo "Tables created and data inserted successfully.";
?>
```

### Explanation

1. **Database Connection**:
- The `PDO` object is created with the database connection details.
- Error handling is set to throw exceptions for any database errors.

2. **Creating Tables**:
- The `exec` method is used to execute the SQL script that creates the tables.

3. **Inserting Initial Data**:
- Prepared statements are used to insert data into the `RnDEmployee` table.
- Each employee's data is executed through the prepared statement.
- The last inserted ID is retrieved using `lastInsertId` and inserted into the specific role table (`Developer`, `Tester`, or `SystemAdmin`).

4. **Output**:
- A success message is printed once the tables are created, and the data is inserted successfully.

### Notes

- Make sure to replace the placeholder values (`your_database_name`, `your_username`, `your_password`) with your actual database credentials.
- This script assumes that you are running it in an environment where the PDO extension is enabled and properly configured.