<!-- Modal -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="product_form" onsubmit="return false">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Fecha</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
            </div>
            <div class="form-group col-md-6">
              <label>Nombre del producto</label>
              <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Nombre del producto" required>
            </div>
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" id="select_cat" name="select_cat" required/>
              

              
            </select>
          </div>
          <div class="form-group">
            <label>Proveedor</label>
            <select class="form-control" id="select_brand" name="select_brand" required/>
              

              
            </select>
          </div>
          <div class="form-group">
            <label>Precio</label>
            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Precio del producto" required/>
          </div>
          <div class="form-group">
            <label>Cantidad</label>
            <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Agregar cantidad" required/>
          </div>

          <div class="form-group col-md-6">
              <label>Detalle del producto</label>
              <input type="text" class="form-control" name="d_product" id="d_product" placeholder="Detalle del producto" required>
            </div>

            
          <button type="submit" class="btn btn-success">Agregar Producto</button>                 
        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>