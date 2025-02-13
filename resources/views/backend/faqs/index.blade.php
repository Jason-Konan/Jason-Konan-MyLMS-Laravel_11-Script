<x-admin-layout title="Faqs Setttings">
  <h2>Gérer la FAQ</h2>
  <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Ajouter une question</a>

  <table class="table">
    <thead>
      <tr>
        <th>Question</th>
        <th>Réponse</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($faqs as $faq)
      <tr>
        <td>{{ $faq->question }}</td>
        <td>{{ $faq->answer }}</td>
        <td>
          <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning">Modifier</a>
          <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</x-admin-layout>
