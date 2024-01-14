<div class="py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form {{ $attributes }} method="POST">
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
        </div>
    </div>
</div>
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
        margin-top: 1.5rem;
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
