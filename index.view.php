<?php require 'Dice.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Random Dicer</title>
	<link rel="shortcut icon" href="YahyaNmini.png" type="image/x-icon"/>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='bg-black '>
	<h1
	class="font-sans text-center text-white bg-black text-[3.5rem] mt-8 mb-6 font-bold"
	>
		RANDOM DICER
	</h1>
	<div>
		<form name='RollDice' method='post'>
			<div class="flex justify-between ml-96 mr-96 mb-12">
				<label
				class="text-white text-[30px] mr-4">
					Number of dice
				</label>
				<input
				class='rounded-lg p-2'
				name='number'
				type="number"
				id="dices-count"
				min="1" max="10"
				value="<?php echo isset($_POST['number']) ? $_POST['number'] : '' ?>"
				>	
			</div>
			<div class="flex justify-between ml-96 mr-96 mb-12">
				<label class="text-white text-[30px] mr-4">
					Number of sides of each die
				</label>
				<select 
				id='dice'
				class="rounded-lg p-2"
				name='dice'
				>
				  <option value="0">Select</option>
				  <option value="4">d4</option>
				  <option value="6">d6</option>
				  <option value="8">d8</option>
				  <option value="10">d10</option>
				  <option value="12">d12</option>
				  <option value="20">d20</option>
				</select>				
			</div>
			<div class="flex justify-center">
				<button
				class=
				'bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded-lg
				mb-8 text-[1.3rem]
				' 
				type='submit'>
					Roll
				</button>
			</div>
			
			<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["dice"]!=='0'): ?>
				<?php
					$result=RollRand();
				?>
				<ul class="flex justify-evenly flex-wrap">
					<?php foreach($result as $num):?>
						<li class="text-[30px] list-none bg-white p-6 rounded-md">
							<?= $num; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</form>
	</div>
	
	<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            document.RollDice.submit();
        }
    }
	</script>
	<script type="text/javascript">
  		document.getElementById('dice').value = "<?php echo isset($_POST['dice']) ? $_POST['dice'] : '' ?>";
	</script>
</body>
</html>