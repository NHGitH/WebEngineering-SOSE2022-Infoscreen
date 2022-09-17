<x-layout>
    <div class="a">
        <div class="b">
            <a href="/administration/1">Login</a>
            <h1>more</h1>
            <h1>more</h1>
            <h1>more</h1>
        </div>
    </div>
</x-layout>

<style>
    .a {
        display: flex;
        /* The image used */
        background-image: url("/images/layered-waves-haikei.svg");
        height: 100vw;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .b {
        position: absolute;
        left: 0;
        top: 40%;
        width: 100%;
        text-align: center;
        color: #000;
    }

    .b>h1,a {
        color: white;
    }
</style>