<x-app-layout>

<div class="min-h-screen bg-[#020817] text-white">

<div class="max-w-7xl mx-auto py-10 px-6">

<h1 class="text-6xl font-black mb-3">Dashboard</h1>
<p class="text-zinc-400 text-xl mb-10">Visão geral do seu negócio</p>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

<div class="bg-[#0f172a] p-8 rounded-3xl shadow">
<p class="text-zinc-400 mb-3">Lucro Total</p>
<h2 class="text-5xl font-black text-green-400">
R$ {{ number_format($totalProfit, 2, ',', '.') }}
</h2>
</div>

<div class="bg-[#0f172a] p-8 rounded-3xl shadow">
<p class="text-zinc-400 mb-3">Investido em Estoque</p>
<h2 class="text-5xl font-black text-blue-400">
R$ {{ number_format($invested, 2, ',', '.') }}
</h2>
</div>

<div class="bg-[#0f172a] p-8 rounded-3xl shadow">
<p class="text-zinc-400 mb-3">Itens em Estoque</p>
<h2 class="text-5xl font-black">{{ $available }}</h2>
</div>

<div class="bg-[#0f172a] p-8 rounded-3xl shadow">
<p class="text-zinc-400 mb-3">Itens Vendidos</p>
<h2 class="text-5xl font-black">{{ $sold }}</h2>
</div>

</div>

<div class="bg-[#0f172a] rounded-3xl shadow overflow-hidden">

<div class="p-8 border-b border-zinc-800 flex justify-between items-center">
<h2 class="text-3xl font-black">Histórico de produtos</h2>

<a href="/products"
   class="bg-blue-500 hover:bg-blue-600 transition px-5 py-3 rounded-xl font-bold">
Ver estoque
</a>
</div>

<table class="w-full">

<thead class="bg-[#111827] text-zinc-400">
<tr>
<th class="text-left p-5">Produto</th>
<th class="text-left p-5">Categoria</th>
<th class="text-left p-5">Compra</th>
<th class="text-left p-5">Venda</th>
<th class="text-left p-5">Lucro</th>
<th class="text-left p-5">Status</th>
</tr>
</thead>

<tbody>

@forelse($products as $product)

<tr class="border-t border-zinc-800">
<td class="p-5 font-bold">{{ $product->name }}</td>
<td class="p-5">{{ $product->category }}</td>
<td class="p-5">R$ {{ number_format($product->purchase_price, 2, ',', '.') }}</td>
<td class="p-5">
@if($product->sale_price)
R$ {{ number_format($product->sale_price, 2, ',', '.') }}
@else
-
@endif
</td>
<td class="p-5 font-bold {{ $product->profit >= 0 ? 'text-green-400' : 'text-red-400' }}">
R$ {{ number_format($product->profit, 2, ',', '.') }}
</td>
<td class="p-5">
@if($product->status == 'sold')
<span class="bg-green-500 text-black px-4 py-2 rounded-full text-sm font-bold">Vendido</span>
@else
<span class="bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold">Disponível</span>
@endif
</td>
</tr>

@empty

<tr>
<td colspan="6" class="p-12 text-center text-zinc-500">
Nenhum produto cadastrado ainda.
</td>
</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</x-app-layout>