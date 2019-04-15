<div class="form-inline">
  <div class="form-group">
    <select ng-model="orderProp" class="form-control">
      <option value="default">Ordenar por</option>
      <option value="linha.nome">Linha</option>
      <option value="marca.nome">Marca</option>
      <option ng-show="va" value="potencia_va">Potência</option>
      <option ng-show="kva" value="potencia_kva">Potência</option>      
    </select>
  </div>
</div>
