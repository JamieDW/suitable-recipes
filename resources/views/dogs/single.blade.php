<tr class="h-10">
    <td>{{ $dog->name }}</td>
    <td>{{ ucfirst($dog->breed) }}</td>
    <td>{{ $dog->getAgeFormatted() }}</td>
    <td>{{ $dog->allergies->join(', ', ' and ') }}</td>
    <td class="flex items-center space-x-2" style="display:flex; item">
        @foreach ($dog->getSuitableRecipes() as $recipe)
            <span class="bg-green-400 text-green-800 rounded-lg p-1 font-semibold">
                {{ $recipe->name }}
            </span>
        @endforeach
    </td>
</tr>