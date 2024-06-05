@extends('layout')


<form method="POST" action="{{ route('handle-text-input') }}">
        @csrf
        <div class="container">
        <div class="content">
        <div class ="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" id="name" required maxlength="255" class="form-control" lengh>
        </div>
        <div class ="mb-3">
        <label for="text" class="form-label">Saran dan Kritik:</label>
        <input class="form-control" type="text" name="text" id="text" required>
        </div>
        <br>
        <div class ="mb-3">
        <label for="datetime">Date/Time:</label>
        <input type="datetime-local" name="datetime" id="datetime" required>
</div>
<br>

<div class ="mb-3"> 
        <button type="submit" class="btn btn-primary" >Submit</button>
        </div>
        </div>
        </div>
    </form>