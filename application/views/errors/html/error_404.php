<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style type="text/css">
		body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
		}

		.container {
			width: 400px;
			margin: 100px auto;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			animation: shake 0.5s ease-in-out;
		}

		@keyframes shake {
			0% {
				transform: translateX(0);
			}

			10% {
				transform: translateX(-10px);
			}

			20% {
				transform: translateX(10px);
			}

			30% {
				transform: translateX(-10px);
			}

			40% {
				transform: translateX(10px);
			}

			50% {
				transform: translateX(-10px);
			}

			60% {
				transform: translateX(10px);
			}

			70% {
				transform: translateX(-10px);
			}

			80% {
				transform: translateX(10px);
			}

			90% {
				transform: translateX(-10px);
			}

			100% {
				transform: translateX(0);
			}
		}

		h1 {
			color: #555;
			font-size: 24px;
			margin-bottom: 10px;
		}

		p {
			color: #777;
			margin-bottom: 20px;
		}

		a {
			color: #337ab7;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		.error-code {
			font-size: 64px;
			color: #337ab7;
			margin-bottom: 20px;
		}

		.error-message {
			font-size: 18px;
			color: #777;
			margin-bottom: 20px;
		}

		.back-link {
			display: inline-block;
			padding: 10px 20px;
			background-color: #337ab7;
			color: #fff;
			border-radius: 3px;
			text-decoration: none;
		}

		.back-link:hover {
			background-color: #13537f;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>404 Page Not Found</h1>
		<p class="error-code">404</p>
		<p class="error-message">Oops! The page you requested could not be found.</p>
		<a href="http://localhost/rentso" class="back-link">Go Back</a>
	</div>
</body>

</html>