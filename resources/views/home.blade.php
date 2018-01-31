@extends('layouts.app')

@section('content')
<div class="container" oncontextmenu="return alert('wo');">
    <div class="row">
        <h1>Event</h1>
        <h3>Form On Submit</h3>
        <form method="POST" action="" 
            onsubmit="return confirm('Kirim data?')">
            <div class="input-field col s12">
                <input type="text" name="">
                <label>Input</label>
            </div>
            <button class="btn waves-light waves-effect" 
            type="submit">Submit</button>
        </form>

        <h3>On Change</h3>
        <div class="input-field col s12">
            <input type="text" name="" onchange="return alert('edited')">
            <label>Input</label>
        </div>

        <h3>On Input</h3>
        <div class="input-field col s12">
            <input type="text" name="" oninput="return alert('on input')">
            <label>Input</label>
        </div>

        <h3>On Keydown &amp; On Keyup</h3>
        <div class="input-field col s12">
            <input type="text" name="" 
                onkeydown="return alert('on key down')"
                onkeyup="return alert('on key up')" 
                onkeypress="return alert('on key press')">
            <label>Input</label>
        </div>

        <h3>On Blur</h3>
        <div class="input-field col s12">
            <input type="text" name="" 
                onblur="return alert('unfocused from input')">
            <label>Input</label>
        </div>

        <h3>On Focus (console log)</h3>
        <div class="input-field col s12">
            <input type="text" name="" 
                onfocus="console.log('focused to input')">
            <label>Input</label>
        </div>
    </div>
</div>
@endsection
