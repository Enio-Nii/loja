			var total = 0;
			var tipo = null;

			function cartao(isCartao){
				if (isCartao)
				{
					document.getElementById("forma-cartao").style.display = "block";
					tipo = "c";
				}
				else
				{
					document.getElementById("forma-cartao").style.display = "none";
					tipo = "d";
				}

				calcTotal();
			}

			function calcTotal() {
				var tempSubtotal = subtotal;

				if (document.getElementById("frete").checked)
					tempSubtotal += 60;

				if(tipo == "c") {
					parcelas = parseInt(document.getElementById("parcelas").value);

					if (parcelas > 1) {
						total = tempSubtotal/parcelas;
						document.getElementById("info").innerHTML = "(em " + parcelas+ " vezes)";
					} else {
						total = tempSubtotal-(subtotal*0.1);
						document.getElementById("info").innerHTML = "(com 10% de desconto)";
					}
				} else {
					total = tempSubtotal-(subtotal*0.1);
					document.getElementById("info").innerHTML = "(com 10% de desconto)";
				}

				total = parseFloat(total.toFixed(2));
				document.getElementById("total").innerHTML="R$ "+total.toLocaleString("pt-br");
			}