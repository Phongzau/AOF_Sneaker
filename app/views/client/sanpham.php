    <?php 
	$html_sp =  showsp($dssp);
	$html_showsponehot = showsp_one_hot($sphot);
	?>
	<main>
		<style>
.input {
  padding: 5px;
  border: 2px solid #ccc;
  border-radius: 5px;
  font-size: 13px;
  color: #555;
  outline: none;
  margin-bottom: 20px;
}

.input:focus {
  border-color: #007bff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn {
 background-color: #00BFA6;
 padding: 5px ;
 width: 100px;
 font-size: 15px;
 color: #fff;
 text-transform: uppercase;
 letter-spacing: 2px;
 cursor: pointer;
 border-radius: 10px;
 border: 2px dashed #00BFA6;
 box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
 transition: .4s;
}

.btn span:last-child {
 display: none;
}

.btn:hover {
 transition: .4s;
 border: 2px dashed #00BFA6;
 background-color: #fff;
 color: #00BFA6;
}

.btn:active {
 background-color: #87dbd0;
}

		</style>
	<?=$html_showsponehot?>
		<div class=""></div>
			<div id="stick_here"></div>		
			<!-- /toolbox -->
			
			<div class="main_title p-5">
			<div class="toolbox elemento_stick">
	                    <div class="container">
	                        <ul class="clearfix">
								<form action="index.php?cl=locsp" method="POST" >
								<li>
								<input type="text" class="input" name="min_price" placeholder="Nhỏ Nhất" >
								<input  type="text" class="input" name="max_price" placeholder="Lớn Nhất" >
								
								<button class="btn" type="submit" name="loc" >lọc</button>
								</li>
								<li>
								
								</li>
								</form>
	                        </ul>
	                    </div>
	                </div>

				<h2>Sản Phẩm </h2>
				<p><?php if(isset($titlepage)) { echo $titlepage;}?></p>
			</div>
			<div class="container margin_30">
			<div class="row small-gutters">
				<?=	$html_sp ?>
				</div>
				<!-- /col -->				
			</div>
			<div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders over $99</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Secure Payment</h3>
								<p>100% secure payment</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Support</h3>
								<p>Online top support</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</main>
	<!-- /main -->
