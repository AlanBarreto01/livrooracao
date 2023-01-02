<?php 

use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'index'])->name('index'); //Controle + Método index
Route::get('/names',[HomeController::class, 'names'])->name('names');
Route::get('/login',[HomeController::class,'login'])->name('login'); //Controle + Método 
//Route:post('/login')


/*$app->get("/login", function()
	{

		$page = new Page();

		$page -> 
});

$app->post("/login", function()
	{
		try{

		User::login($_POST['login'], $_POST['password']); //Método estático não precisa de "new"

		}catch(Exception $e){

			User::setError($e->getMessage());

		}

		header("Location: /checkout");
		exit;
});

$app->get("/logout", function()
	{

		User::logout();

		$cart = new Cart();

		$cart->removeFromSession();

		session_regenerate_id();

		header("Location: /login");
		exit;
});

	$app->post("/register", function()
	{
		$_SESSION['registerValues'] = $_POST;

		if(!isset($_POST['name']) || $_POST['name'] == '')
		{

			User::setErrorRegister("Preencha o seu nome.");

			header("Location: /login");
			exit;

		}

		

		if(!isset($_POST['password']) || $_POST['password'] == '')
		{

			User::setErrorRegister("Preencha o seu senha.");

			header("Location: /login");
			exit;

		}

		if(User::checkLoginExist($_POST['email']) === true)
		{

			User::setErrorRegister("Esse email já existe.");

			header("Location: /login");
			exit;

		}

		$user = new User();


		$user->setData([
			'inadmin'=>0,
			'deslogin'=>$_POST['email'],
			'desperson'=>$_POST['name'],
			'desemail'=>$_POST['email'],
			'despassword'=>$_POST['password'],
			'nrphone'=>$_POST['phone']
		] );

		$user->save();

		User::login($_POST['email'], $_POST['password']);

		header("Location: /checkout");
		exit;

});



	//-->Aqui começa Esqueci a Senha do Usuário<--//

	
$app->get("/forgot", function() {

	$page = new Page();

	$page->setTpl("forgot");	

});

$app->post("/forgot", function(){

	$user = User::getForgot($_POST["email"], false);

	header("Location: /forgot/sent");
	exit;

});

$app->get("/forgot/sent", function(){

	$page = new Page();

	$page->setTpl("forgot-sent");	

});


$app->get("/forgot/reset", function(){

	$user = User::validForgotDecrypt($_GET["code"]);

	$page = new Page();

	$page->setTpl("forgot-reset", array(
		"name"=>$user["desperson"],
		"code"=>$_GET["code"]
	));

});

$app->post("/forgot/reset", function(){

	$forgot = User::validForgotDecrypt($_POST["code"]);	

	User::setFogotUsed($forgot["idrecovery"]);

	$user = new User();

	$user->get((int)$forgot["iduser"]);

	$password = User::getPasswordHash($_POST["password"]);

	$user->setPassword($password);

	$page = new Page();

	$page->setTpl("forgot-reset-success");

/*
$app->get("/categories/:idcategory", function($idcategory){

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			'link'=>'/categories/'.$category->getidcategory().'?page='.$i,
			'page'=>$i
		]);
	}

	$page = new Page();

	$page->setTpl("category", [
		'category'=>$category->getValues(),
		'products'=>$pagination["data"],
		'pages'=>$pages
	]);

});

$app->get("/products/:desurl", function($desurl){

	$product = new Product();

	$product->getFromURL($desurl);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);

});

$app->get("/cart", function(){

	//$cart = Cart::getFromSession();

	$page = new Page();

	$page->setTpl("cart", [
		'cart'=>[],
		'products'=>[],
		'error'=>[]
	]);



});

$app->get("/cart/:idproduct/add", function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1; //retorna a quantidade ou 1

	for ($i = 0; $i < $qtd; $i++) {
		
		$cart->addProduct($product);

	}

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/minus", function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$cart->removeProduct($product);

	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/remove", function($idproduct){

	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();

	$qtd = (isset($_GET['qtd'])) ? (int)$_GET['qtd'] : 1; //retorna a quantidade ou 1

	for ($i = 0; $i < $qtd; $i++) {
		
		$cart->addProduct($product);


		$cart->removeProduct($product, true);

	}


	header("Location: /cart");
	exit;

});

$app->get("/cart/:idproduct/removecart", function($idproduct){


	$product = new Product();

	$product->get((int)$idproduct);

	$cart = Cart::getFromSession();//Pegar o carrinho

	$cart->removeProduct($product, true);

	header("Location: /cart");
	exit;

});

$app->post("/cart/freight", function(){

	$cart = Cart::getFromSession();

	$cart->setFreight($_POST['zipcode']);

	header("Location: /cart");
	exit;

});

$app->get("/checkout", function()
	{

		User::verifyLogin(false);

		$address = new Address();

		$cart = Cart::getFromSession();

		if(isset($_GET['zipcode']))
		{

			$_GET['zipcode'] = $cart->getdeszipcode();
		}


		if(isset($_GET['zipcode']))
		{

			$address->loadFromCEP($_GET['zipcode']);
		
			$cart->setdeszipcode($_GET['zipcode']);

			$cart->save();

			$cart->getCalculateTotal();

		}

		if(!$address->getdesaddress())$address->setdesaddress('');
		if(!$address->getdesnumber())$address->setdesnumber('');
		if(!$address->getdescomplement())$address->setdescomplement('');
		if(!$address->getdesdistrict())$address->setdesdistrict('');
		if(!$address->getdescity())$address->setdescity('');
		if(!$address->getdesstate())$address->setdesstate('');
		if(!$address->getdescountry())$address->setdescountry('');
		if(!$address->getdeszipcode())$address->setdeszipcode('');

		$page = new Page();

		$page -> setTpl("checkout", [
			'cart'=>$cart->getValues(),  //variavel cart, recebe o objeto carrinho, pega os valores dele
			'address'=>$address->getValues(),
			'products'=>$cart->getProducts(),
			'error'=>Address::getMsgError()

		]);

});

$app->post("/checkout", function()
	{
		User::verifyLogin(false);

		if(!isset($_POST['zipcode']) || $_POST['zipcode'] === '')
		{

			Address::setMsgError('Informe o CEP.');
			header('Location: /checkout');
			exit;	

		}

		if(!isset($_POST['desaddress']) || $_POST['desaddress'] === '')
		{

			Address::setMsgError('Informe o Endereço.');
			header('Location: /checkout');
			exit;	

		}

		if(!isset($_POST['desdistrict']) || $_POST['desdistrict'] === '')
		{

			Address::setMsgError('Informe o Bairro.');
			header('Location: /checkout');
			exit;	

		}

		if(!isset($_POST['descity']) || $_POST['descity'] === '')
		{

			Address::setMsgError('Informe a Cidade.');
			header('Location: /checkout');
			exit;	

		}

		if(!isset($_POST['desstate']) || $_POST['desstate'] === '')
		{

			Address::setMsgError('Informe o Estado.');
			header('Location: /checkout');
			exit;	

		}

		if(!isset($_POST['descountry']) || $_POST['descountry'] === '')
		{

			Address::setMsgError('Informe o País.');
			header('Location: /checkout');
			exit;	

		}




		$user = User::getFromSession();

		$address = new Address();

		$_POST['deszipcode'] = $_POST['zipcode'];
		$_POST['idperson'] = $user->getidperson();

		$address->setData($_POST);

		$address->save();

		$cart = Cart::getFromSession();

		$totals = $cart->getCalculateTotal();

		$order = new Order();

		$order->setData([
			'idcart'=>$cart->getidcart(),
			'idaddress'=>$address->getidaddress(),
			'iduser'=>$user->getiduser(),
			'idstatus'=>OrderStatus::EM_ABERTO,
			'vltotal'=>$cart->getvltotal()
		]);


		$order->save();

		header("Location: /order/" . $order->getidorder());
		exit;	

});




 
//-->Aqui termina Esqueci a Senha do Usuário<--//

$app->get("/profile", function()
{
	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile", [
		'user'=>$user->getValues(),
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	]);

});

$app->post("/profile",function()
{

	User::verifyLogin(false);

	if(!isset($_POST['name']) || $_POST['name'] === '')
	{

		User::setError('Preencha o seu nome');
		header('Location: /profile');
		exit;

	}

	if(!isset($_POST['email']) || $_POST['email'] === '')
	{

		User::setError('Preencha o seu email');
		header('Location: /profile');
		exit;


	}

	$user = User::getFromSession();

	if($_POST['email'] !== $user->getdesemail())
	{

		if(User::checkLoginExist($_POST['email'])=== true)
		{

			User::setError('Este email já está cadastrado.');
			header('Location: /profile');
			exit;

		}

	}

	$_POST['inadmin'] = $user->getinadmin();
	$_POST['password'] = $user->getdespassword();
	$_POST['login'] = $_POST['email'];
	
	

	$user->setData($_POST);


	$user->save();

	$user->getUserName($_POST['login']);

	//User::setSuccess('Dados alterados com sucesso!');

	header('Location: /profile/created');
	exit;

});

$app->get("/profile/created", function()
{
	User::verifyLogin(false);

	User::getFromSession();
	
	$page = new Page();

	$page->setTpl("profile-created", [
		
		'profileMsg'=>User::getSuccess(),
		'profileError'=>User::getError()
	
	]);

	User::setSuccess('Dados alterados com sucesso!');

});


$app->get("/order/:idorder", function($idorder)
{
	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);	

	$page = new Page();

	$page->setTpl("payment", [
		'order'=>$order->getValues()
	]);

});

$app->get("/boleto/:idorder", function($idorder)
{

	User::verifyLogin();

	$order = new Order();

	$order->get((int)$idorder);

	// DADOS DO BOLETO PARA O SEU CLIENTE
	$dias_de_prazo_para_pagamento = 5;
	$taxa_boleto = 2.95;
	$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
	$valor_cobrado = formatPrice($order->getvltotal()); // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
	$valor_cobrado = str_replace(",", ".",$valor_cobrado);
	$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

	$dadosboleto["nosso_numero"] = $order->getidorder();  // Nosso numero - REGRA: Máximo de 8 caracteres!
	$dadosboleto["numero_documento"] = $order->getidorder();	// Num do pedido ou nosso numero
	$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
	$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
	$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
	$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

	// DADOS DO SEU CLIENTE
	$dadosboleto["sacado"] = $order->getdesperson();
	$dadosboleto["endereco1"] = $order->getdesaddress() . " " . $order->getdesdistrict();
	$dadosboleto["endereco2"] = $order->getdescity() . "-" . $order->getdesstate() . "-" . $order->getdescountry() . " . CEP:" . $order->getdeszipcode();

	// INFORMACOES PARA O CLIENTE
	$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Loja Vini Wear";
	$dadosboleto["demonstrativo2"] = "Taxa bancária - R$ 0,00";
	$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";
	$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
	$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
	$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: almace01@gmail.com";
	$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

	// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
	$dadosboleto["quantidade"] = "";
	$dadosboleto["valor_unitario"] = "";
	$dadosboleto["aceite"] = "";		
	$dadosboleto["especie"] = "R$";
	$dadosboleto["especie_doc"] = "";


	// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


	// DADOS DA SUA CONTA - ITAÚ
	$dadosboleto["agencia"] = "4336"; // Num da agencia, sem digito
	$dadosboleto["conta"] = "66775";	// Num da conta, sem digito
	$dadosboleto["conta_dv"] = "5"; 	// Digito do Num da conta

	// DADOS PERSONALIZADOS - ITAÚ
	$dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

	// SEUS DADOS
	$dadosboleto["identificacao"] = "BoletoPhp - Código Aberto de Sistema de Boletos";
	$dadosboleto["cpf_cnpj"] = "927.086.252-68";
	$dadosboleto["endereco"] = "Rua J, 180 - Vila Santa Helena, 74555-350";
	$dadosboleto["cidade_uf"] = "Goiânia - GO";
	$dadosboleto["cedente"] = "Alan Davison Monteiro Macedo Barreto";

	// NÃO ALTERAR!
	$path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "res". DIRECTORY_SEPARATOR . "boletophp" . DIRECTORY_SEPARATOR . "include" . DIRECTORY_SEPARATOR;

	require_once($path . "funcoes_itau.php");
	require_once($path . "layout_itau.php");
	
});

$app->get("/profile/orders", function()
{

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl('profile-orders',[
		'orders'=>$user->getOrders()
	]);

});

$app->get("/profile/orders/:idorder", function($idorder)
{

	User::verifyLogin(false);

	$order = new Order();

	$order->get((int)$idorder);

	$cart = new Cart();

	$cart->get((int)$order->getidcart());

	$cart->getCalculateTotal();

	$page = new Page();

	$page->setTpl('profile-orders-detail', [
		'order'=>$order->getValues(),
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts()
	]);

});

$app->get("/profile/change-password", function()
{

	User::verifyLogin(false);
	
	$page = new Page();

	$page->setTpl("profile-change-password", [
		'changePassError'=>User::getError(),
		'changePassSuccess'=>User::getSuccess()
	]);

});


$app->post("/profile/change-password", function()
{

	User::verifyLogin(false);

	if(!isset($_POST['current_pass']) || $_POST['current_pass'] === '')
	{

		User::setError('Digite a senha atual.');
		header("Location: /profile/change-password");
		exit;

	}

	if(!isset($_POST['new_pass']) || $_POST['new_pass'] === '')
	{

		User::setError('Digite a nova senha.');
		header("Location: /profile/change-password");
		exit;

	}

	if(!isset($_POST['new_pass_confirm']) || $_POST['new_pass_confirm'] === '')
	{

		User::setError('Confirme a nova senha.');
		header("Location: /profile/change-password");
		exit;

	}

	if($_POST['current_pass'] === $_POST['new_pass'])
	{

		User::setError('A sua nova senha deve ser diferente da atual.');
		header("Location: /profile/change-password");
		exit;

	}

	$user = User::getFromSession();

	if(!password_verify($_POST['current_pass'], $user->getdespassword()))
	{

		User::setError('A senha está inválida.');
		header("Location: /profile/change-password");
		exit;

	}

	$user->setdespassword($_POST['new_pass']);

	$user->update();

	User::setSuccess("Senha alterada com sucesso!");

	header("Location: /profile/change-password");
	exit;

});

*/
?>