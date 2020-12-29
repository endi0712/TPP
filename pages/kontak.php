<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<style type="text/css">
	h1{
		text-align: center;
	}
	.contact{
	display: block;
	margin-bottom: 40px;
	margin: 40px;
	margin-left: 25%;
	}


	.contact li{
	text-align: left;
	margin-bottom: 25px;
	font-size: 25px;
	}

	.contact a{
	text-decoration: none;
	color: black;
	font-size: 20px;
	margin-left: 10px;
	}

	.contact li:hover a{
	text-decoration: none;
	color: grey;
	
	}

	.feedback input{
		border: 1px solid rgba(156, 118, 179, 0.5);
		width: 350px;
		height: 40px;
	
		margin: 10px;
	}

	.feedback textarea{
		width: 350px;
		height: 100px;
		border-color: rgba(156, 118, 179, 0.5);
		margin: 10px;
	}

	.feedback{
		margin: 30px;
	}
</style>
<main>
	<h1>CONTACT</h1>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="contact">
				<ul  style=" list-style-type: none;">
				<li>
					<i class="fa fa-phone"></i>
					<a href="">(0274) 654-123987</a>
				</li>
				<li>	
					<i class="fa fa-envelope"></i>
					<a href="">e-ukm@gmail.com</a>
				</li>
				<li>
					<i class="fab fa-instagram"></i>	
					<a href="">@ukm_gedangrejo</a>
				</li>
				<li>
					<i class="fab fa-twitter"></i>
					<a href="">@ukm_gedangrejo</a>
				</li>
				<li>
					<i class="fab fa-facebook-f"></i>
					<a href="">UKM Gedangrejo</a>
				</li>
			</ul>	
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="feedback">
				<form action="aksi_feedback.php" method="post">
				<h6>Fell free to give a feedback!</h6>
				<input type="text" name="pengirim" placeholder="From : "><br>
				<textarea name="isi" placeholder="Message..."></textarea>
				<div class="send-btn">
					<button class="btn-more" type="submit">SEND</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</main>