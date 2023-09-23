<!doctype html>
<html lang="en">
<?php include('pages/head.php'); ?>

<body>
	<?php include('pages/navbar.php'); ?>

	<div class="alert alert-warning alert-dismissible fade show" role="alert" id="abc" style="display:none;">
		<strong > !</strong>
		<button type="button" class="btn-close border border-primary rounded-circle my-3 me-2 p-1" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

	<main class="row justify-content-center my-2 mx-0">
		<div class="col-md-10">
			<div class="card">
				<h5 class="card-header bg-secondary text-center text-light">Add report</h5>
				<!-- <form action="action/insert.php" method="post" enctype="multipart/form-data"> -->

					<div class="card-body fw-bold add_report">
						<div class="row">
							<div class="form-group col-md-4">
								<label for="buyer">Full name*</label>
								<input type="text" class="form-control" name="buyer" id="buyer" placeholder="Enter name" required>
								<div class="error" id="buyerErr"></div>
							</div>
							<div class="form-group col-md-4">
								<label for="email">Email*</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>	
								<div class="error" id="emailErr"></div>
							</div>
							<div class="form-group col-md-4">
								<label for="phone">Mobile number*</label>
								<input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone">
								<div class="error" id="phoneErr"></div>
							</div>
						</div>
						<div class="row my-2">
							<div class="form-group col-md-4">
								<label for="city">City*</label>
								<input type="text" class="form-control" name="city" id="city" placeholder="Enter city" required>
								<div class="error" id="cityErr"></div>
							</div>
							<div class="form-group col-md-4">
								<label for="items">Items name*</label>
								<input type="text" class="form-control" name="items" id="items" placeholder="Enter item" required>
								<div class="error" id="itemsErr"></div>
							</div>
							<div class="form-group col-md-4">
								<label for="amount">Amount*</label>
								<input type="number" class="form-control" name="amount" min="1" id="amount" placeholder="Enter amount">
								<div class="error" id="amountErr"></div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="note">Note*</label>
								<textarea type="text" class="form-control summernote required" name="note" id="note" placeholder="Enter note"></textarea>
								<div class="error" id="noteErr"></div>							
							</div>
						</div>
						<div class="row justify-content-md-center mt-2">
							<button type="submit" class="btn btn-success col-md-6" value="Add" onclick="addReport()">Save now</button>
						</div>
					</div>
				<!-- </form> -->
			</div>
		</div>
	</main>

	<!-- Modal -->
	<?php 
		include('pages/modal/loginModal.php');
		include('pages/footer.php');
		unset($_SESSION['response']);		
	?>

	<script>
		function printError(elemId, hintMsg) {
			document.getElementById(elemId).innerHTML = hintMsg;
		}

		function load(src){
			const script =document.createElement("script");
			script.src = src;
			document.head.prepend(script);
		}

		function addReport() {
            var buyer 	= $('.add_report #buyer').val();
            var email 	= $('.add_report #email').val();
            var phone 	= $('.add_report #phone').val();
            var city 	= $('.add_report #city').val();
            var items 	= $('.add_report #items').val();
            var amount 	= $('.add_report #amount').val();
            var note 	= $('.add_report #note').val();

		// Validation start...			
			// Defining error variables with a default value
			var buyerErr = emailErr = phoneErr = cityErr = itemsErr = amountErr = noteErr = true;			
						
			// Validate buyer name
			if(buyer == "") {
				printError("buyerErr", "Please enter your name");
			} else {
				var regex = /^[a-zA-Z\s]+$/;                
				if(regex.test(buyer) === false) {
					printError("buyerErr", "Please enter a valid name");
				} else {
					printError("buyerErr", "");
					buyerErr = false;
				}
			}
			
			// Validate email address
			if(email == "") {
				printError("emailErr", "Please enter your email address");
			} else {
				// Regular expression for basic email validation
				var regex = /^\S+@\S+\.\S+$/;
				if(regex.test(email) === false) {
					printError("emailErr", "Please enter a valid email address");
				} else {
					printError("emailErr", "");
					emailErr = false;
				}
			}
			
			// Validate phone number
			if(phone == "") {
				printError("phoneErr", "Please enter your mobile number");
			} else {
				let total_length = phone.length;
				if (total_length == '10' || total_length == '11') {
					if (total_length == '11') {
						$("#phone").val("88" + $("#phone").val());
					}
					else if (total_length == '10') {
						$("#phone").val("880" + $("#phone").val());
					}
					printError("phoneErr", "");
					phoneErr = false;
				}
				else {
					printError("phoneErr", "Mobile number will be (10-11) digit. " + "you give : " + total_length);
				}
			}
			
			// Validate amount number
			if(amount == "") {
				printError("amountErr", "Please enter your amount");
			}else{			
				var reg = /^[1-9][0-9]+$/;
				if (reg.test(amount) == false){
					printError("amountErr", "Amount : Do not start with zero");
				}else{
					printError("amountErr", "");
					amountErr = false;
				}
			}	
			
			// Validate city
			if(city == "") {
				printError("cityErr", "Please enter your city");
			} else {
				printError("cityErr", "");
				cityErr = false;
			}
			
			// Validate items
			if(items == "") {
				printError("itemsErr", "Please enter your items");
			} else {
				printError("itemsErr", "");
				itemsErr = false;
			}
			
			// Validate note
			if(note == "") {
				printError("noteErr", "Please select your note");
			} else {
				printError("noteErr", "");
				noteErr = false;
			}
			
			// Prevent the form from being submitted if there are any errors
			if((buyerErr || emailErr || phoneErr || cityErr || itemsErr || amountErr || noteErr) == true) {
				return false;
			}		
		// Validation end...
			
			$.ajax({
                type: 'post',
				url: "action/insert.php",
                data: {
                    buyer: buyer,
                    email: email,
                    phone: phone,
                    city: city,
                    items: items,
                    amount: amount,
                    note: note,
                },
				dataType: 'json',
                success: function (data) {
					// var respons = JSON.parse(JSON.stringify(data));
					$('.add_report input[type="text"], input[type="number"], input[type="email"]').val('');
					$('.summernote').summernote('reset');				
					toastr.options.closeButton = true;
					toastr.options.closeMethod = 'fadeOut';
					toastr.options.closeDuration = 100;
					toastr.success(data.message);   
                }
            })
        }
	</script>
</body>
</html>