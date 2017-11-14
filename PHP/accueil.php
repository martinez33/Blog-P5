<!DOCTYPE HTML>
<html>

  <head>
    <meta charset="utf-8">
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body { background-color:#DDD; }
     [class*="col"] { margin-bottom: 20px; }
      .form-inline { margin-top: 20px;}
      img { width: 100%; }
      .well {
        background-color:#CCC;
        padding: 20px;
      }
       .inline-form input {
            display: inline-block;
            width: 100px;
        }
    </style>
  </head>

  <body>
  
    <div class="container">



<!-- BARRE DE NAVIGATION -->



      <?php include("barre-nav.php"); ?>







      <header class="row">
        <div class="col-sm-12 col-lg-7">
          <h1>Bienvenue sur mon Blog</h1>
        </div>
        <div class="col-sm-12 col-lg-5">
         
          
        </div>
      </header>



      <section class="row">
        <div class="col-lg-12">
          
      </section>




      <section class="row">
        <div class="col-xs-4 col-sm-3 col-md-2 "> 
        </div>
        
      </section>





      <div class="row">
        
        <section class="col-sm-4">
         <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Mes compétences</h3>
              </div>
                <div class="list-group">
                  
                  
                </div>
            </div>
         </section>

        <section class="col-sm-8">
          <div >
            
          </div>
      </div>





      <div class="row">
        <section class="col-sm-8">
         

         <div class="panel panel-primary">
          <table class="table table-striped table-condensed">
            <div class="panel-heading"> 
              <h3 class="panel-title">Les derniers posts</h3>
            </div>
            <thead>
              <tr>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
        </div>

        </section>
      </div>
      <div class="row">
        <section class="col-sm-8">


          <form class="well">
            <h4><span class="label label-default">Si vous voulez me laisser un message</span></h4>
            <h4>Comment m'avez-vous trouvé ?</h4>
            <fieldset>
              <div class="radio">
                <label for="ami" class="radio">
                  <input type="radio" name="origine" value="ami" id="ami">
                  Par un ami 
                </label>
              </div>
              <div class="radio">
                <label for="web" class="radio">
                  <input type="radio" name="origine" value="web" id="web">
                  Sur le web 
                </label>
              </div>
              <div class="radio">
                <label for="hasard" class="radio">
                  <input type="radio" name="origine" value="hasard" id="hasard">
                  Par hasard 
                </label>
              </div>
              <div class="radio">
                <label for="autre" class="radio">
                  <input type="radio" name="origine" value="autre" id="autre">
                  Autre... 
                </label>
              </div>
              <label for="textarea">Votre message :</label>
                <textarea id="textarea" class="form-control" rows="4"></textarea>
                <p class="help-block">Vous pouvez agrandir la fenêtre</p>
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok-sign"></span> Envoyer</button>
            </fieldset>
          </form>


        </section>
        

        <div class="media col-lg-12">
        <div class="media-left">
         
        </div>
        <div class="media-body">
          
        </div>
      </div>
      </div>
    </div>
  </body>
</html>