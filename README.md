<h1 align="center">🛒 Simulador de Carrinho de Compras</h1>

<p align="center">
  Este projeto é um simulador simples de carrinho de compras desenvolvido em <b>PHP</b>. 
  O objetivo foi aplicar boas práticas de programação, como <b>PSR-12</b>, <b>DRY (Don't Repeat Yourself)</b> e 
  <b>KISS (Keep It Simple, Stupid)</b>, para simular o fluxo de checkout de um e-commerce. 
  Todo o sistema funciona com dados fixos em arrays, sem a necessidade de um banco de dados.
</p>

<hr>

<h2>👥 Dupla</h2>
<ul>
  <li><b>Nome:</b> Vinicius Miguel de Oliveira Garcia — <b>RA:</b> 2002638</li>
  <li><b>Nome:</b> Otavio Algusto — <b>RA:</b> 1999877</li>
</ul>

<hr>

<h2>⚙️ Como Rodar o Projeto</h2>
<ol>
  <li>Certifique-se de que você tem o <b>XAMPP</b> instalado e com o PHP rodando.</li>
  <li>Coloque a sua pasta dentro do diretório <code>htdocs</code> do seu XAMPP.</li>
  <li>Abra seu navegador e acesse: 
      <a href="http://localhost/carrinho/index.php" target="_blank">
      http://localhost/carrinho/index.php</a></li>
</ol>

<hr>

<h2>📂 Estrutura e Organização do Código</h2>
<ul>
  <li><b>Cart.php:</b> Gerencia o carrinho (adicionar, remover, calcular total e desconto).</li>
  <li><b>products.php:</b> Define a classe <code>Product</code>, representando um produto com nome, preço e estoque.</li>
  <li><b>listProducts.php:</b> Repositório de produtos, permite buscar por ID e verificar estoque.</li>
  <li><b>index.php:</b> Ponto de entrada principal, simula ações do usuário e exibe os resultados.</li>
</ul>

<hr>

<h2>✅ Funcionalidades Implementadas</h2>
<ul>
  <li><b>Adicionar Item:</b> Valida o estoque e atualiza automaticamente.</li>
  <li><b>Remover Item:</b> Restaura o estoque do produto removido.</li>
  <li><b>Calcular Total:</b> Soma dos subtotais dos itens do carrinho.</li>
  <li><b>Aplicar Desconto:</b> Cupom <code>DESCONTO10</code> aplica 10% de desconto no total.</li>
</ul>

<hr>

<h2>🧪 Exemplos de Uso (Casos de Teste)</h2>
<ol>
  <li><b>Caso 1:</b> Adiciona produto válido (id=1, qtd=2) e atualiza estoque.</li>
  <li><b>Caso 2:</b> Tenta adicionar além do estoque (id=3, qtd=10) → mensagem de erro.</li>
  <li><b>Caso 3:</b> Remove produto (id=2) → estoque restaurado.</li>
  <li><b>Caso 4:</b> Aplica cupom <code>DESCONTO10</code> → reduz valor final em 10%.</li>
</ol>

<hr>

<h2>⚠️ Limitações do Projeto</h2>
<ul>
  <li><b>Não persiste os dados:</b> Arrays apenas em memória (carrinho reinicia ao recarregar).</li>
  <li><b>Sem interface gráfica:</b> Demonstração apenas via código.</li>
  <li><b>Sem frameworks:</b> Desenvolvido em PHP puro, focado em boas práticas.</li>
</ul>

<hr>

