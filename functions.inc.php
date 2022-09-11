<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_product($con,$limit='',$cat_id='',$product_id=''){
	$sql="select product.*,categories.categories from product,categories where product.status=1 ";
	if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	$sql.=" and product.categories_id=categories.id ";
	$sql.=" order by product.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}



//rating
function check_login($con)
    {
        if(isset($_SESSION['USER_ID']))
        {
    
            $id = $_SESSION['USER_ID'];
            $query = "select * from users where id = '$id' limit 1";
    
            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0)
            {
    
                $userdata = mysqli_fetch_assoc($result);
                return $userdata;
            }
        }else{
            
        //redirect to login
        // header("Location: login.php");    
        }
    }
?>