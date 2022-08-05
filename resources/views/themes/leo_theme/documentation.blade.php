@extends('theme::layouts.app')

@section('content')

<style>
		@import url('https://fonts.googleapis.com/css?family=Pontano+Sans');

	html, body {
	font-family: 'Pontano Sans', sans-serif;
	font-size: 18px;
	background-color: #fff;
	color: #000;
	letter-spacing: 1px;
	}

	/*------------NAV BAR----------------*/

	#navbar {
	background-color: #f4f4f4;
	height: 96%;
	top: 10px;
	position: fixed;
	width: 22%;
	}

	.nav header {
	display: block;
	text-align:center;
	margin: 0 10px;
	padding: 5px;
	border-bottom: 1px solid #30336b;
	font-size: 120%;
	font-weight: thin;
	color: #95a5a6;
	}

	.nav-link:link {
	color: #30336b;
	margin-top: 10px;
	padding-left: 30px;
	}
	.nav-link:hover,
	.nav-link:active {
	color: #fff;
	background-color: #2c3e50;
	transition: 0.3s;
	}

	.nav-link:visited {
	color: #fd79a8;
	}

	.head-box {
	background-color: #2c3e50;
	color: #fff;
	padding: 20px;
	text-align: center;
	margin-top: 10px;
	}

	/*-------------BODY-----------*/

	header {
	margin-top: 20px;
	}

	h2 {
	font-weight: bold;
	color: #130f40;
	}

	h3 {
	margin-top: 20px;
	padding-left: 15px;
	color: #30336b;
	}

	p {
	font-size: 90%;
	line-height: 1.5;
	padding-left: 30px;
	padding-right: 20px;
	text-align: justify;
	}

	section article {
	padding-right: 20px;
	}

	article li {
	font-size: 80%;
	margin-left: 20px;
	}

	/*---CODE SECTION---*/

	pre {
	display: inline-block;
	background-color: #34495e;
	color: #fff;
	margin-left: 40px;
	padding: 0 0 20px 30px;
	font-size: 80%;
	width: 90%;
	white-space: pre-line;

	}

	/*-------FOOTER------*/

	hr {
	border: 0.5px solid;
	color: #34495e;
	}

	a {
	color: #8e44ad;
	font-weight: bold;
	}

	a:hover {
	text-decoration: none;
	color: #e84393;
	}

	.fa {
	font-size: 22x;
	}

	footer {
	text-align: center;
	}

	footer p {
	text-align: center;
	margin-bottom: 10px;
	font-size: 80%;
	}

	/*---------RESPONSIVE--------*/

	@media only screen and (max-width: 768px) {
	#navbar {
		position: relative;
		width: 100%;
		margin-bottom: 20px;
		padding-bottom: 10px;
		text-align: center;
	}
	}

	@media only screen and (max-width: 480px) {
	pre {
		font-size: 60%;
		max-width: 80%;
		margin-left: 30px;
		padding: 0 10px 10px 20px;
	}
	}
</style>

<body>
<div class="container-fluid">
  <div class="row">
    
    <div class="col">
      <nav id="navbar">
        <ul class="nav flex-column">
         <header></header><br><br><br>	
          <li class="nav-item">
            <a class="nav-link introduction" href="#Introduction">Introduction</a>
          </li>
          <li class="nav-item">
           <a class="nav-link layout" href="#getting">Getting started</a>
          </li>
          <li class="nav-item">
            <a class="nav-link content" href="#run">How to run this demo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link components" href="#next">Next version</a>
          </li>
      </ul>
   </nav>
  </div>
      
<div class="col-md-9">
  <main id="main-doc">    
    <div class="head-box">
      <h1>HyperLedyer Demo ver1</h1>
    </div>
    
      <section class="main-section" id="Introduction">
        <header><h2>Introduction</h2></header>
          <article>
			  <p>This demo is based on <a href="https://github.com/hyperledger/aries-cloudagent-python/blob/main/demo/AriesOpenAPIDemo.md">this</a> documentation</p>
       	  </article>
     </section>
  
  <section class="main-section" id="getting">
    <header><h2>Getting started</h2></header>
      <article>
		<p>Before start make sure both agents (faber and alice) are up and running<br>
		You should be able to access to its swagger interfaces.<br>
		This app uses same url and port to control the agents</p>
		<pre>
    	<code>
			./run_demo alice
		</code>
  		</pre>
    </article>    
  </section>

  <section class="main-section" id="run">
    <header><h2>How to run the demo </h2></header>
      <article>
		<p>The idea is to follow the messaging and credential issue flow with simple clicks</p>

			<ol class="list-group list-group-numbered">
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Faber creates an invitation</div>
						On the create invitation card , add an alias and click "create".
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Alice receives the invitation</div>
					The invitation body of the previously created invitation should appears on alice side
					<br>Click Receive to store the invitation.
					<br>You should see the new invitation listed as new connection. 
					</div>
					<span class="badge bg-primary rounded-pill">14</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Alice accept the invitation </div>
						Just click the accept button and faber will be notified.
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Faber accept the request </div>
						copy the connection Id (you can take it from the connection listed above)
						<br>in the Connection ID field and click "Acept the request".								
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Faber accept the request </div>
						copy the connection Id (you can take it from the connection listed above)
						<br>in the Connection ID field and click "Acept the request".								
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Last created connections should change to active </div>
						Now you should refresh the browser and will notice that icons on each listed
						<br>Connection has changed.								
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Send messages </div>
						Now you can send messages from one agent to the other using the message icon.
						<br>You can check it at each agent console.
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Issue a credential</div>
						Faber now,can issue a credencial , 
						<br>just click on the issue a credential icon on the active link
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Fill the credential data</div>
						Fill the credential data on the popup form and click "issue".
						<br>After that you should see the credential received on alice records side.
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Alice store the credential</div>
						Reload the browser to list the alice records 
						<br>Now alice can store the credencial , just click on the "store credential" icon.
						<br> The record state should change to "done".
					</div>
				</li>
			</ol>

    </article>    
  </section>
  
  <section class="main-section" id="next">
    <header><h2>Next version</h2></header>
      <article>
		<p>For the following version of this app , it should:</p>
		<ol class="list-group list-group-numbered">
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Provision both agents</div>
						We are using the built-in alice and faber agents, now we should run our own agents.
						<br>It means that wwe should take care of:
						<br>Registering the did.
						<br>Registering a credential scheema.
					</div>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-start">
					<div class="ms-2 me-auto">
					<div class="fw-bold">Use QR codes to connect</div>
						We are using out of band messaging.
						<br>This is ok for testing propose but we should implement DIDComm for production.
					</div>
				</li>
				
			</ol>
    </article>    
  </section>
  

 <footer>
      <div class="contact">
    <a href="https://github.com/linh4" target="_blank">
      <span class="icon"><i class="fa fa-github"></i></span></a>
    <a href="https://codepen.io/linh4/" target="_blank">
      <span class="icon"><i class="fa fa-codepen"></i></span></a>
    <a href="https://www.freecodecamp.org/linh4" target="_blank">
      <span class="icon"><i class="fa fa-free-code-camp"></i></span></a>
  </div>
      <p>&copy 2018 Linh Huynh</p>
    </footer>    
    
  </div>
 </div>
</div>
    

@endsection
