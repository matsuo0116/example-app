@auth
  <div>
    <!-- <p>投稿フォーム</p> -->
    @if (session('feedback.success'))
    <p style="color:green">{{ session('feedback.success') }}</p>
    @endif
    <form action="{{ route('tweet.create') }}" method="post" enctype="multipart/form-data">
      @csrf
      <!-- <label for="tweet-content">つぶやき</label> -->
      <textarea name="tweet" rows="3" class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2" id="tweet-content" type="text" placeholder="つぶやきを入力"></textarea>
      <p class="mt-2 text-sm text-gray-500">140文字まで</p>
      <x-tweet.form.images></x-tweet.form.images>

      @error('tweet')
      <p style="color: red;">{{ $message }}</p>
      @enderror
      
      <div class="flex flex-wrap justify-end">
        <x-element.button>
          つぶやく
        </x-element.button>
      </div>

    </form>
    <div>
    @endauth
    @guest
    <div class="flex flex-wrap justify-center">
      <div class="w-1/2 p-4 flex flex-wrap justify-evenly">
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
        <x-element.button-a :href="route('register')" theme="secondary">会員登録</x-element.button-a>

       
      </div>
    </div>
    @endguest
