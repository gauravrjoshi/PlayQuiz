<?php include 'PhpPrograms.php'; ?>
 <?php if (count($_POST) != 0): $digit = $_POST['digit'];?>	 	
 	<?php if ($_POST['program'] == 'sumOfDigits'): ?>
 		<p>Sum of Digit <?php echo $_POST['digit'];?> is <?php echo $program->sumOfDigits($digit); ?></p>
 	<?php elseif ($_POST['program'] == 'evenOddProgram'):?>
 		<p><?php echo $program->evenOddProgram($digit);  ?></p>
 	<?php elseif ($_POST['program'] == 'factorialProgram'):?>
 		<p><?php echo $program->factorialProgram($digit); ?></p>
 	<?php elseif ($_POST['program'] == 'tableOfNumber'):?>
 		<p>Table of <?php echo $_POST['digit'];?> <br><?php echo $program->tableOfNumber($digit);  ?></p>
 	<?php elseif ($_POST['program'] == 'primeNumber'):?>
 		<p>Here is the list the first 15 prime numbers. <br><?php $program->primeNumber(); ?></p>
 		<?php elseif ($_POST['program'] == 'armstrongNumber'):?>
 		<p><?php $program->armstrongNumber($digit); ?></p>
 		<?php elseif ($_POST['program'] == 'palindromeNumber'):?>
 		<?php $program->palindromeNumber($digit); ?>
 	<?php endif ?> 	
 <?php endif;?>	
