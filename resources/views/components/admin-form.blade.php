<div>
    <form {{$attributes}} method="POST">
        @csrf
        {{ $slot }}
        <div class="error" id="errorMessage">
            @foreach ($errors->all() as $error)
            @error($error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @enderror
            @endforeach
        </div>
            <x-primary-button type="submit"
                style="align-self:end; margin-top: 2rem; margin-right:1rem;">Post</x-primary-button>
    </form>

    <script>
        setTimeout(() => {
            document.getElementById("errorMessage").innerHTML = '';
        }, 2000);
    </script>
    <style>
        form {
            display: flex;
            flex-direction: column;
        }

        label,
        textarea,
        select,
        input {
            padding: 1rem;
        }

        #errorMessage {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .alert {
            color: red;
            margin-bottom: 1rem;
        }

        textarea {
            height: 200px;
            border-radius: 1%;
        }
    </style>
</div>
