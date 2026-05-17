<x-app-layout>

<div class="min-h-screen bg-[#020817] text-white">

<div class="max-w-7xl mx-auto py-10 px-6">

<div class="flex items-center justify-between mb-10">
    <div>
        <h1 class="text-6xl font-black mb-3">Estoque</h1>
        <p class="text-zinc-400 text-xl">{{ $products->count() }} produto(s) cadastrados</p>
    </div>

    <a href="/products/create"
       class="bg-blue-500 hover:bg-blue-600 transition px-6 py-4 rounded-2xl font-bold">
        Nova Compra
    </a>
</div>

<form method="GET" class="mb-8">
    <input type="text"
           name="search"
           value="{{ request('search') }}"
           placeholder="Buscar por nome, categoria ou tag..."
           class="w-full md:w-1/2 bg-[#0f172a] border border-zinc-700 rounded-2xl px-5 py-4 text-white">
</form>

<div class="bg-[#0f172a] rounded-3xl overflow-hidden shadow">

<table class="w-full">

<thead class="bg-[#111827] text-zinc-400">
<tr>
    <th class="text-left p-5">Status</th>
    <th class="text-left p-5">Produto</th>
    <th class="text-left p-5">Categoria</th>
    <th class="text-left p-5">Compra</th>
    <th class="text-left p-5">Venda Esperada</th>
    <th class="text-left p-5">Lucro</th>
    <th class="text-left p-5">Ações</th>
</tr>
</thead>

<tbody>

@forelse($products as $product)

<tr class="border-t border-zinc-800">

<td class="p-5">
@if($product->status == 'sold')
<span class="bg-green-500 text-black px-4 py-2 rounded-full text-sm font-bold">Vendido</span>
@else
<span class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold">Disponível</span>
@endif
</td>

<td class="p-5 font-bold">
{{ $product->name }}
</td>

<td class="p-5">
{{ $product->category }}
</td>

<td class="p-5">
R$ {{ number_format($product->purchase_price, 2, ',', '.') }}
</td>

<td class="p-5">
R$ {{ number_format($product->expected_sale_price, 2, ',', '.') }}
</td>

<td class="p-5 font-bold {{ $product->profit >= 0 ? 'text-green-400' : 'text-red-400' }}">
R$ {{ number_format($product->profit, 2, ',', '.') }}
</td>

<td class="p-5">

@if($product->status == 'available')

<form method="POST"
      action="{{ route('products.sell', $product) }}"
      class="flex gap-3">

@csrf

<input type="number"
       step="0.01"
       name="sale_price"
       placeholder="Valor venda"
       required
       class="w-32 bg-[#020817] border border-zinc-700 rounded-xl px-3 py-2 text-white">

<input type="date"
       name="sale_date"
       required
       class="bg-[#020817] border border-zinc-700 rounded-xl px-3 py-2 text-white">

<select name="sale_payment"
        class="bg-[#020817] border border-zinc-700 rounded-xl px-3 py-2 text-white">
    <option value="PIX">PIX</option>
    <option value="Dinheiro">Dinheiro</option>
    <option value="Cartão">Cartão</option>
</select>

<button class="bg-green-500 hover:bg-green-600 transition text-black px-4 py-2 rounded-xl font-bold">
Vender
</button>

</form>

@else

<span class="text-zinc-500">
Vendido por R$ {{ number_format($product->sale_price, 2, ',', '.') }}
</span>

@endif

</td>

</tr>

@empty

<tr>
<td colspan="7" class="text-center p-16 text-zinc-500 text-xl">
Nenhum produto cadastrado.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</x-app-layout>