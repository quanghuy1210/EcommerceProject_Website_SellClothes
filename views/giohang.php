
<style type="text/css">
	.shopping-cart{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
	}

	.shopping-cart.dark{
		background-color: #f6f6f6;
	}
/*#e9ecef*/
	.shopping-cart .content{
		box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
		background-color: #e9ecef;
	}

	.shopping-cart .block-heading{
	    padding-top: 50px;
	    margin-bottom: 40px;
	    text-align: center;
	}

	.shopping-cart .block-heading p{
		text-align: center;
		max-width: 420px;
		margin: auto;
		opacity:0.7;
	}

	.shopping-cart .dark .block-heading p{
		opacity:0.8;
	}

	.shopping-cart .block-heading h1,
	.shopping-cart .block-heading h2,
	.shopping-cart .block-heading h3 {
		margin-bottom:1.2rem;
		color: #3b99e0;
	}

	.shopping-cart .items{
		margin: auto;
	}

	.shopping-cart .items .product{
		margin-bottom: 20px;
		padding-top: 20px;
		padding-bottom: 20px;
	}

	.shopping-cart .items .product .info{
		padding-top: 0px;
		text-align: center;
	}

	.shopping-cart .items .product .info .product-name{
		font-weight: 600;
	}

	.shopping-cart .items .product .info .product-name .product-info{
		font-size: 14px;
		margin-top: 15px;
	}

	.shopping-cart .items .product .info .product-name .product-info .value{
		font-weight: 400;
	}

	.shopping-cart .items .product .info .quantity .quantity-input{
	    margin: auto;
	    width: 80px;
	}

	.shopping-cart .items .product .info .price{
		margin-top: 15px;
	    font-weight: bold;
	    font-size: 22px;
	 }

	.shopping-cart .summary{
		border-top: 2px solid #5ea4f3;
	    background-color: #f7fbff;
	    height: 100%;
	    padding: 30px;
	}

	.shopping-cart .summary h3{
		text-align: center;
		font-size: 1.3em;
		font-weight: 600;
		padding-top: 20px;
		padding-bottom: 20px;
	}

	.shopping-cart .summary .summary-item:not(:last-of-type){
		padding-bottom: 10px;
		padding-top: 10px;
		border-bottom: 1px solid rgba(0, 0, 0, 0.1);
	}

	.shopping-cart .summary .text{
		font-size: 1em;
		font-weight: 600;
	}

	.shopping-cart .summary .price{
		font-size: 1em;
		float: right;
	}

	.shopping-cart .summary button{
		margin-top: 20px;
	}

	@media (min-width: 768px) {
		.shopping-cart .items .product .info {
			padding-top: 25px;
			text-align: left; 
		}

		.shopping-cart .items .product .info .price {
			font-weight: bold;
			font-size: 22px;
			top: 17px; 
		}

		.shopping-cart .items .product .info .quantity {
			text-align: center; 
		}
		.shopping-cart .items .product .info .quantity .quantity-input {
			padding: 4px 10px;
			text-align: center; 
		}
	}
</style>
<main class="page">
 	<section class="shopping-cart dark">
 		<div class="container">
	        <div class="block-heading">
	          <h2>Giỏ Hàng</h2>
	          <p>Hãy Tận Hưởng Các Ưu Đãi Từ Shop Nhé</p>
	        </div>
	        <div class="content">
 				<div class="row">
 					<?php 
 						$tongtien = 0;
 						if(isset($_SESSION['cart'])){
 						foreach($xem["gio"] as $k => $v){
 							$gia = $v['price'] * $_SESSION['cart'][$v['id']];
 							$tongtien += $gia;
 					?>
 					<div class="col-md-12 col-lg-8">
 						<div class="items">
			 				<div class="product">
			 					<div class="row">
				 					<div class="col-md-2">
				 						<a href="?url1=chitiet&&id=<?php echo $v["id"]; ?>">
				 							<img class="img-fluid mx-auto d-block image"  src="image/<?php echo $v['image_link']?>">
				 						</a>
				 					</div>
				 					<div class="col-md-8">
				 						<div class="info">
					 						<div class="row">
						 						<div class="col-md-5 product-name">
						 							<div class="product-name">
							 							<div class="product-info">
								 							<div>Tên sản phẩm: 
								 								<span class="value">
								 									<a href="?url1=chitiet&&id=<?php echo $v["id"]; ?>"><?php echo $v["name"] ?></a>
								 								</span>
								 							</div>
								 						</div>
								 					</div>
						 						</div>
						 						<div class="col-md-3 quantity">
						 							<label for="quantity">Số Lượng:</label>
						 							<input id="quantity" type="number" value ="<?php echo $_SESSION['cart'][$v['id']] ?>" class="form-control quantity-input" onchange="soluong()">
						 						</div>
						 						<div class="col-md-3  product-name">
						 							Giá: 
						 							<span><?php echo number_format($gia)?> vnd</span>
						 						</div>
						 						<div class="col-md-1 product-name">
						 							<a href="#">Xóa</a>
						 						</div>
						 					</div>
						 				</div>
				 					</div>
				 				</div>
			 				</div>
			 			</div>
		 			</div>
					<?php 
						}
					}
					else{
 						echo '<h2>KHÔNG CÓ SẢN PHẨM NÀO CẢ!</h2>';
 					}
					?>
<script type="text/javascript">
	function soluong() {
		alert("da thay doi so luong ")

	}
</script>
		 			<div class="col-md-12 col-lg-4">
<?php
	if(isset($_SESSION['cart'])){
?>
		 				<div class="summary">
		 					<h3>Bảng Tóm Tắt</h3>
		 					<div class="summary-item"><span class="text">Tổng Phụ  :  </span><span class="price"><?php echo number_format($tongtien)?> vnd</span></div>
		 					<div class="summary-item"><span class="text">Giảm Giá  :  </span><span class="price">0 vnd</span></div>
		 					<div class="summary-item"><span class="text">Phí Chuyển:  </span><span class="price">0 vnd</span></div>
		 					<div class="summary-item"><span class="text">Tổng Tiền :  </span><span class="price"><?php echo number_format($tongtien)?> vnd</span></div>
		 					<button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
			 			</div>
<?php
}
?>
		 			</div>
	 			</div> 
	 		</div>
 		</div>
 		
	</section>
</main>