<?php header('X-XSS-Protection: 0'); ?>
<!DOCTYPE html>
<html>

<head>
	<title>XSS Challanges</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		h1 {
			text-align: left;
			padding: 15px;
		}

		textarea {
			width: 350px;
			height: 75px;
			padding: 10px;
			margin: 5px;
		}



		input[type=submit],
		[type=button] {
			background-color: #4CAF50;
			color: white;
			border-radius: 4px;
			padding: 10px 20px;
			text-decoration: none;
			margin: 5px;
			cursor: pointer;
		}

		input[type=submit],
		[type=button] {
			box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19)
		}

		details {
			margin: 5px;
		}

		#exploitTable {
			margin: 5px;
			padding: 10px;
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 90%;
		}

		#exploitTable td,
		#exploitTable th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#exploitTable tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#exploitTable tr:hover {
			background-color: #ddd;
		}

		#exploitTable th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>

</head>

<body>

	<br />
	<h1>XSS Challanges</h1>
	<table id="exploitTable">
		<tr>
			<th>XSS One (basic)</th>
			<th>XSS Two (Tag encode)</th>
		</tr>
		<tr>
			<!-- ##############################################################################  -->
			<td>

				<br />
				<div>
					<form>
						<textarea name="test1" placeholder="Enter a payload"><?= htmlspecialchars($_GET['test1'], ENT_QUOTES, 'UTF-8') ?></textarea>
						<br /><input type="submit" value="Test payload">
					</form>

				</div>
				<div><br />
					<!-- eg payloads: -->
					<!-- "><script>alert(1)</script> -->
					<!-- "><img/src=x onmouseenter="javascript:alert(1)"/> -->
					<!-- XSS HERE --><?php
					$res = $_GET['test1'];
					echo "Result: " . $res; ?>
					<!-- XSS END -->
				</div>

				<details>
					<summary>Hints</summary>
					<p>None for this one, too easy!</p>
				</details>
				<br />
			</td>
			<!-- ##############################################################################  -->
			<!-- ##############################################################################  -->
			<td>
				<br />
				<div>
					<form>
						<textarea id="test2" placeholder="Enter a payload"></textarea>
						<br /><input type="button" onclick="update()" value="Test payload">
					</form>

				</div>
				<div><br />
					<!-- eg payload: "><script>alert(1)</script> -->
					<!-- XSS HERE -->
					<script type="text/javascript">
						function escape(s) {
							var text = s.replace(/</g, '&lt;').replace(/"/g, '&quot;');
							// URLs
							text = text.replace(/(http:\/\/\S+)/g, '<a href="$1">$1</a>');
							// [[img123|Description]]
							text = text.replace(/\[\[(\w+)\|(.+?)\]\]/g, '<img alt="$2" src="$1.gif">');
							return text;
						}

						function update() {
							var ele = document.getElementById("test2");
							var data = ele.value;
							var res = document.getElementById("updateme");
							res.innerText = "Results: " + escape(ele.value);
						}
					</script>
					<div><label id="updateme">Results: </label></div>
					<!-- XSS END -->
				</div>
				<details>
					<summary>Hints</summary>
					<p>A few charaters are encoded</p>

				</details>
				<br />
			</td>
			<!-- ##############################################################################  -->
		</tr>
	</table>


	<table id="exploitTable">
		<tr>
			<th>URL Encode/Decode</th>
			<th>Hex Encode/Decode</th>
		</tr>
		<tr>
			<td>
				<!-- ################################ START #########################################  -->

				<script type="text/javascript">
					function encode() {
						var obj = document.getElementById('urlencode');
						var unencoded = obj.value;
						obj.value = encodeURIComponent(unencoded).replace("/'/g", "%27").replace('/"/g', "%22");
					}

					function decode() {
						var obj = document.getElementById('urlencode');
						var encoded = obj.value;
						obj.value = decodeURIComponent(encoded.replace("/\+/g", " "));
					}
				</script>
				<form>
					<textarea id="urlencode"> <?= htmlspecialchars(isset($_GET['code']), ENT_QUOTES, 'UTF-8') ?></textarea>
					<br /><input type="button" onclick="encode()" value="Encode"><input type="button" onclick="decode()" value="Decode">
				</form>
				<div>
					<?php

					?>
				</div>

			</td><!-- ################################ END #########################################  -->

			<td>
				<!-- ################################ START #########################################  -->
				<script type="text/javascript">
					decode

					function ascii_to_hexa(str) {
						var arr1 = [];
						for (var n = 0, l = str.length; n < l; n++) {
							var hex = Number(str.charCodeAt(n)).toString(16);
							arr1.push(hex);
						}
						console.log("$arr1");
						return arr1.join('');
					}


					function hex2a(hexx) {
						var hex = hexx.toString(); //force conversion
						var str = '';
						for (var i = 0;
							(i < hex.length && hex.substr(i, 2) !== '00'); i += 2)
							str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
						return str;
					}

					function decodehex() {
						var obj = document.getElementById('hexencode');
						obj.value = hex2a(obj.value);
					}

					function encodehex() {
						var obj = document.getElementById('hexencode');
						obj.value = ascii_to_hexa(obj.value);

					}
				</script>
				<form>
					<textarea id="hexencode"> <?= htmlspecialchars(isset($_GET['code']), ENT_QUOTES, 'UTF-8') ?></textarea>
					<br /><input type="button" onclick="encodehex()" value="Encode"><input type="button" onclick="decodehex()" value="Decode">
				</form>


			</td><!-- ################################ END #########################################  -->


		</tr>

	</table>


</body>

</html>
