<?php
function insert_danhmuc($tenloai)
{
    $sql = "INSERT INTO `categorys`(`category_name`) VALUES ('$tenloai')";
    pdo_execute($sql);
}
function load_danhmuc()
{
    $sql = "SELECT * FROM categorys order by category_id";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function delete_danhmuc($id)
{
    $id = $_GET['category_id'];
    $sql = "DELETE FROM categorys WHERE category_id = '$id';";
    pdo_execute($sql);
}
function loadone_danhmuc($id)
{
    $id = $_GET['category_id'];
    $sql = "SELECT * FROM categorys WHERE category_id = '$id';";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($tenloai, $id)
{
    $sql = "UPDATE `categorys` SET `category_name`='$tenloai' WHERE `category_id`='$id'";
    pdo_execute($sql);
}
