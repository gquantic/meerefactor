<?php
function excutemail($title, $msg){
?>

<div class="body">
	<div class="header inner">
		<div>
			<h1><?=$title;?></h1>
			<div class="line"></div>
		</div>
		<div>
			<img src="logo.png" width="200px" alt="">
		</div>
	</div>
	<div class="card-body inner">
		<p>
			<?=$msg;?>
		</p>
	</div>
</div>

<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap');

	.body{
		font-family: 'Roboto', calibri, Arial;
		width: 100%; max-width: 600px;
		background: url(bg.png);
		background-size: cover;
		background-position: bottom left;
		min-height: 400px;
	}

	.header{
		display: inline-flex;
		width: 100%;
		justify-content: space-between;
		align-items: center;
		height: 50px;
	}

	.header h1{
		font-weight: 600;
		font-size: 24px;
	}

	.header .line{
		background: #FF6100;
		height: 7px;
		width: 200px;
		margin-top: -21px;
	}
	.header img{
		margin-top: 20px;
	}

	.card-body{
		margin-top: 40px;
	}
</style>

<?}?>