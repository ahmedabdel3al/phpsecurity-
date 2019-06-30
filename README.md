<h1>What is SQL Injection ?</h1>  </br>
SQL injection is a code injection technique that might destroy your database.
<h2>Example</h2><br> 
//database connection  <br>
$dbConnection = new PDO('mysql:host=127.0.0.1;dbname=phpsecurity', 'root', '');  
//when i use query it easy to attacker to make sqlinjection <br>
// assuming $email = ';Drop Table users;-- <br>
// this sql will be like this  Select * from users WHERE email = ''; Drop Table users;-- <br>
$connection->query("SELECT * from users WHERE email = '{$email}'");<br>
How can I prevent SQL injection in PHP? <br>
Use prepared statements and parameterized queries. These are SQL statements that are sent to and parsed by the database server separately from any parameters. This way it is impossible for an attacker to inject malicious SQL 
//remove this line from code <br>
$connection->query("SELECT * from users WHERE email = '{$email}'");<br>
//sql statment prepared so attaker can not make sqlinjection  <br>
$connection->prepare("SELECT * from users WHERE email = :email"); <br>
$connection->execute(['email'=>'abolya2011@gmail.com'])

 