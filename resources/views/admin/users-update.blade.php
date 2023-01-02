@include ('admin/header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/{{$user->id}}" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="deslogin">Id</label>
              <input type="text" class="form-control" id="deslogin" name="deslogin" placeholder="Digite o login"  value="{{$user->id}}">
            </div>

            <div class="form-group">
              <label for="desperson">Nome</label>
              <input type="text" class="form-control" id="desperson" name="desperson" placeholder="Digite o nome" value="{{$user->name}}">
            </div>
          
            <div class="form-group">
              <label for="desemail">E-mail</label>
              <input type="email" class="form-control" id="desemail" name="desemail" placeholder="Digite o e-mail" value="{{$user->email}}">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="inadmin" value="1" {if="$user.inadmin == 1"}checked{/if}> Acesso de Administrador
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include ('admin/footer')