<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= html_escape($page_title); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-gray-900 h-screen flex justify-center items-center">

  <div class="bg-gray-700 p-6 rounded-xl w-80">
    <h1 class="text-white text-2xl text-center mb-5">Login</h1>
    <div class="mb-4">
      <label class="text-white block mb-1">Username</label>
      <input id='username'type="text" class="w-full p-2 rounded">
    </div>
    <div class="mb-4">
      <label class="text-white block mb-1">Password</label>
      <input id='password' type="password" class="w-full p-2 rounded">
	</div>
    <button id='submit' class="bg-blue-500 text-white w-full p-2 rounded">Submit</button>
  </div>
</body>
</html>
<script>
$("#submit").click(function () {
	
    var user = $("#username").val();
    var pass = $("#password").val();

    $.ajax({
		url:"auth/login",
		type:"POST",
		data:{user:user,pass:pass},
		success:function(msg){
			let data = JSON.parse(msg);

			let sukses = data.sukses;
			let pesan  = data.pesan;
			let role = data.role;

			console.log(data);
			if(sukses=="Y"){
				alert(pesan);
				if(role=="admin"){
					window.location.href = "<?= base_url('admin') ?>";
				}else{
					window.location.href = "<?= base_url('customer') ?>";

				}
			}else{
				alert(pesan);
				window.location.reload();
			}
		}

	})
  });

</script>