@include ('header')




<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
           
            <div class="col-md-6">
                
                <div class="alert alert-danger">
                    Error!
                </div>

                <form id="register-form-wrap" action="/register" class="register" method="post">
                    <h2>Adicionar Nomes</h2>
                    <p class="form-row form-row-first">
                        <label for="nome">Nome Completo <span class="required">*</span>
                        </label>
                        <input type="text" id="nome" name="name" class="input-text" value="">
                    </p>
                    
                   
                    <div class="clear"></div>

                    <p class="form-row">
                        <input type="submit" value="Adicionar" name="login" class="button">
                    </p>

                    <div class="clear"></div>
                </form>               
            </div>
        </div>
    </div>
</div>
@include ('footer')