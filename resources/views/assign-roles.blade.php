<!-- resources/views/assign-roles.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard | Admins</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="/vendors/feather/feather.css">
        <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="/vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="/css/vertical-layout-light/dashboard.css">
        <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
      
        <!-- endinject -->
        <link rel="shortcut icon" href="/images/logo.png" />
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="hhttps://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
          <style>
                  .button {
                  background-color: #0039a6;
                  color: #ffffff;
                  width: 8.5em;
                  height: 2.9em;
                  font-size: 15px;
                  border: #0039a6 0.2em solid;
                  border-radius: 11px;
                  text-align: right;
                  transition: all 0.2s ease;
                  }
      
                  .button:hover {
                  background-color: #e2e2e2;
                  cursor: pointer;
                  color: black;
                  }
      
                  .button svg {
                  width: 1.6em;
                  margin: -0.2em 0.8em 1em;
                  position: absolute;
                  display: flex;
                  transition: all 0.2s ease;
                  }
      
                  .button:hover svg {
                  transform: translateX(10px);
                  }
      
                  .text {
                  margin: 0 1.5em
                  }
                  /* radios */
                  :root {
                  --checkbox-size: 16px;
                  --margin: 16px;
                  --margin-small: calc(var(--margin) / 2);
                  --text-lighter: #ccc;
                  --brand: #0039a6;
                  }
      
      
                  fieldset {
                  border: none;
                  display: flex;
                  flex-direction: column;
                  margin: 20px;
                  align-items: flex-start;
                  min-width: 400px;
                  }
      
                  label {
                  display: flex;
                  flex-direction: row;
                  align-items: center;
                  }
      
                  .aside {
                  color: var(--text-lighter);
                  }
      
                  input {
                  position: relative !important;
                  appearance: none;
                  margin: var(--margin-small);
                  box-sizing: content-box;
                  overflow: hidden;
                  }
      
                  /* circle */
                  input:before {
                  content: '';
                  display: block;
                  box-sizing: content-box;
                  width: var(--checkbox-size);
                  height: var(--checkbox-size);
                  border: 2px solid var(--text-lighter);
                  transition: 0.2s border-color ease;
                  }
      
                  input:checked:before {
                  border-color: var(--brand);
                  transition: 0.5s border-color ease;
                  }
      
                  input:disabled:before {
                  border-color: var(--text-lighter);
                  background-color: var(--text-lighter);
                  }
      
                  /* dot */
                  input:after {
                  content: '';
                  display: block;
                  position: absolute;
                  box-sizing: content-box;
                  top: 50%;
                  left: 50%;
                  transform-origin: 50% 50%;
                  background-color: var(--brand);
                  width: var(--checkbox-size);
                  height: var(--checkbox-size);
                  border-radius: 100vh;
                  transform: translate(-50%, -50%) scale(0);
                  }
      
                  input[type="radio"]:before {
                  border-radius: 100vh;
                  }
      
                  input[type="radio"]:after {
                  width: var(--checkbox-size);
                  height: var(--checkbox-size);
                  border-radius: 100vh;
                  transform: translate(-50%, -50%) scale(0);
                  }
      
                  input[type="radio"]:checked:after {
                  animation: toggleOnRadio 0.2s ease forwards;
                  }
      
                  input[type="checkbox"]:before {
                  border-radius: calc(var(--checkbox-size) / 4);
                  }
      
                  input[type="checkbox"]:after {
                  width: calc(var(--checkbox-size) * 0.6);
                  height: var(--checkbox-size);
                  border-radius: 0;
                  transform: translate(-50%, -85%) scale(0) rotate(45deg);
                  background-color: transparent;
                  box-shadow: 4px 4px 0px 0px var(--brand);
                  }
      
                  input[type="checkbox"]:checked:after {
                  animation: toggleOnCheckbox 0.2s ease forwards;
                  }
      
                  input[type="checkbox"].filled:before {
                  border-radius: calc(var(--checkbox-size) / 4);
                  transition: 0.2s border-color ease, 0.2s background-color ease;
                  }
      
                  input[type="checkbox"]:checked:not(:disabled):before {
                  background-color: var(--brand);
                  }
      
                  input:not(:disabled):after {
                  box-shadow: 4px 4px 0px 0px white;
                  }
      
                  @keyframes toggleOnCheckbox {
                  0% {
                      opacity: 0;
                      transform: translate(-50%, -85%) scale(0) rotate(45deg);
                  }
      
                  70% {
                      opacity: 1;
                      transform: translate(-50%, -85%) scale(0.9) rotate(45deg);
                  }
      
                  100% {
                      transform: translate(-50%, -85%) scale(0.8) rotate(45deg);
                  }
                  }
      
                  @keyframes toggleOnRadio {
                  0% {
                      opacity: 0;
                      transform: translate(-50%, -50%) scale(0);
                  }
      
                  70% {
                      opacity: 1;
                      transform: translate(-50%, -50%) scale(0.9);
                  }
      
                  100% {
                      transform: translate(-50%, -50%) scale(0.8);
                  }
                  }
      
          </style>
      </head>
<body>
    @include('Layout.navbar')
    @include('Layout.sidebar')    
    <div class="container mt-5">
        <h1 class="mb-4">Assign Roles to Admins</h1>
        
        <form action="{{ route('assign.roles.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="admin">Select Admin:</label>
                <select name="admin" id="admin" class="form-control">
                    @foreach($sousAdmins as $sousAdmin)
                        <option value="{{ $sousAdmin->id }}">{{ $sousAdmin->nom }} {{ $sousAdmin->prenom }}</option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label>Select Roles:</label>
                @foreach($roles as $role)
    @php
        $isChecked = $sousAdmin->rolesAdmins()->where('role_id', $role->id)->exists();
    @endphp
    <div class="form-check">
        <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->nom_role }}" class="form-check-input" {{ $isChecked ? 'checked' : '' }}>
        <label for="role_{{ $role->id }}" class="form-check-label">{{ $role->nom_role }}</label>
    </div>
@endforeach
            </div>
        
            <button type="submit" class="btn btn-primary">Assign Role</button>
        </form>
        
    </div>
    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
