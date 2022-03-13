<div class="form-layout">
    <h1>
        {{ $title }}
    </h1>
    <form method="post" action="{{ $action }}" enctype="multipart/form-data">
        @csrf
        @method($isPut?'PUT':'POST')

        {{ $slot }}

        <div style="width:100%;text-align:center; margin-top:10px">
            <button type="submit">
                Submit
            </button>
        </div>
    </form>

    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</div>
