<!DOCTYPE html>
<html>

<head>
    <title>Eperformax Exam </title>
    <!-- include libraries(jQuery, bootstrap) -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

    @trixassets
</head>

<style>
.font {
    font-family: 'Helvetica', 'Arial', sans-serif;

}

.btn-submit {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
}

.btn-edit {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
}

.btn-delete {
    background-color: #f44336;
    border: none;
    color: white;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
}

.btn-back {
    background-color: #e7e7e7;
    border: none;
    color: blakk;
    padding: 10px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 15px;
}

.container {
    width: max-content;
    margin: auto;
}

.table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.table th,
.table td {
    padding: 12px 15px;
}

.table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

input[type=text],
select,
textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}


.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

.padding-top {
    padding-top: 10px;
}

.success {
    padding: 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 15px;
}

.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    border-radius: 15px;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}

.pagination {
    display: inline-block;
    width: 500px;
}

.pagination a {
    color: black;
    float: left;
    padding: 4px;
    text-decoration: none;
}

.navbar-ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #666;
}

.navbar-li {
    float: left;
}

.navbar-li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
.navbar-li a:hover {
    background-color: #111;
}
</style>

<body>
    <div class="container font">
        <ul class="navbar-ul">
            <li class="navbar-li"><a href="/products">Products</a></li>
            <li class="navbar-li"><a href="/categories">Categories</a></li>
        </ul>
        @yield('content')
    </div>
</body>

</html>