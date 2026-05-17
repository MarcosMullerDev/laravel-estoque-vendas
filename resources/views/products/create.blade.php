<x-app-layout>

<div class="min-h-screen bg-[#020817] text-white">

<div class="max-w-4xl mx-auto py-12 px-6">

<h1 class="text-6xl font-black mb-3">
Nova Compra
</h1>

<p class="text-zinc-400 text-xl mb-10">
Registre um produto adquirido
</p>

<form method="POST"
      action="{{ route('products.store') }}"
      class="space-y-8">

@csrf

<div class="bg-[#0f172a] p-10 rounded-3xl shadow">

<h2 class="text-3xl font-black mb-8">
Informações do produto
</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div class="md:col-span-2">

<label class="block mb-3 text-zinc-300">
Nome do produto
</label>

<input type="text"
       name="name"
       required
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div>

<label class="block mb-3 text-zinc-300">
Categoria
</label>

<input type="text"
       name="category"
       required
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div>

<label class="block mb-3 text-zinc-300">
Tags
</label>

<input type="text"
       name="tags"
       placeholder="novo, importado..."
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div>

<label class="block mb-3 text-zinc-300">
Preço compra
</label>

<input type="number"
       step="0.01"
       name="purchase_price"
       required
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div>

<label class="block mb-3 text-zinc-300">
Venda esperada
</label>

<input type="number"
       step="0.01"
       name="expected_sale_price"
       required
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div>

<label class="block mb-3 text-zinc-300">
Transporte
</label>

<input type="number"
       step="0.01"
       name="transport_cost"
       value="0"
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div>

<label class="block mb-3 text-zinc-300">
Data da compra
</label>

<input type="date"
       name="purchase_date"
       required
       class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

</div>

<div class="md:col-span-2">

<label class="block mb-3 text-zinc-300">
Forma de pagamento
</label>

<select name="purchase_payment"
        class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white">

<option value="PIX">PIX</option>
<option value="Dinheiro">Dinheiro</option>
<option value="Cartão">Cartão</option>
<option value="Transferência">Transferência</option>

</select>

</div>

<div class="md:col-span-2">

<label class="block mb-3 text-zinc-300">
Observações
</label>

<textarea name="notes"
          rows="5"
          class="w-full bg-[#111827] border border-zinc-700 rounded-2xl px-5 py-4 text-white"></textarea>

</div>

<div class="md:col-span-2">

<label class="flex items-center gap-4">

<input type="checkbox"
       name="has_defect"
       class="w-5 h-5">

<span class="text-zinc-300">
Produto possui defeito
</span>

</label>

</div>

</div>

</div>

<button class="w-full bg-blue-500 hover:bg-blue-600 transition py-5 rounded-2xl text-2xl font-black">

Adicionar ao estoque

</button>

</form>

</div>

</div>

</x-app-layout>