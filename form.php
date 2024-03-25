<div class="order_form_heder flex_column">
  <p class="order_form_title">Por favor efectue o seu pedido com pelo menos 48 horas de antecedencia.</p>
  <p>Apos a submissao do formulario sera contactado pela The Cookie Cake para finalizar a sua encomenda.</p>
</div>

<div class="order_form_content flex_column av_one_third  flex_column_div av-zero-column-padding first">
  <div class="order_form_logo">
    <img src="https://tcc.cheffernandosemedo.com/wp-content/uploads/2020/11/theCookieCake.svg">
  </div>
  <div class="order_text_content">
    <p>Bolo de bolacha com cobertura de cacau e crumble de bolacha Maria com 1100 gr. (aprox. 10 pessoas).</p>
  </div>

  <div class="order_form_label"><label>Quantidade <span class="req">*</span></label></div>
  <div class="quant unidade">
    [number* number-20 id:unidade min:1 max:100 "1" ]
  </div>



</div>

<div class="flex_column av_one_third  flex_column_div av-zero-column-padding">
  <img src="https://tcc.cheffernandosemedo.com/wp-content/uploads/2020/11/92686084_827774014370057_3402136637038133248_o.jpg">
</div>

<div class="flex_column av_one_third  flex_column_div av-zero-column-padding avia-builder-el-last">
  <div class="order_text_content">
    <p class="order_form_title">Entrega</p>
    <p>De momento a entrega esta limitada as freguesias indicadas. Caso a sua localizacao nao conste na listagem abaixo, por favor contacte-nos para:</p>
    <p><a href="mailto:encomendas@thecookiecake.pt">encomendas@thecookiecake.pt</a> ou <a href="tel:+351 932009025">(+351) 932 009 025.</a></p>
  </div>

  <div class="order_form_label"><label>Concelho <span class="req">*</span></label></div>
  <div class="order_form_input inputConcelho">
    [dynamic_select* dynamic_select-260 id:Concelho "source:filter" ]
  </div>

  <div class="order_form_label"><label>Freguesia <span class="req">*</span></label></div>
  <div class="order_form_input inputFreguesia ">
    [dynamic_select* dynamic_select-369 id:Freguesia "source:filter"]
  </div>

</div>

<div class="order_form_footer flex_column">

  <div class="total_wrap">
    <div class="bolo"><span class="bolo_label">Bolo</span>	<span>ˆ19.90</span> [text text-5 readonly id:price class:price "19.90" ]</div>
    <div class="entegra_field"><span class="bolo_label">Entrega</span> [text text-5541 readonly class:entegra_input "0" ]</div>
    <div class="total_field">[text text-554 readonly class:total_input "ˆ19.90" ]</div>
    <div class="iva">IVA incluido</div>
  </div> 


  <div class="submit_wrap">
    <div class="order_paginate"><span class="active">1</span><span>2</span></div>
    <div class="submit_content">[submit class:enivar_input "Enviar"]</div>
  </div>

</div>