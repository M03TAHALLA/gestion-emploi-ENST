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
                  .create-salle-button{
    background-color: #0039a6;
    padding: 15px;
    color: white;
    margin-top: 20px;
    margin-left: 11px;
    border-radius: 8px;
    width: 250px;
}
.create-salle-button:hover{
    background-color: white;
    color: #0039a6;
    border: 1px solid #0039a6;
}
      
          </style>
      </head>
<body>
    @include('Layout.navbar')
    @include('Layout.sidebar')    
    <div class="container mt-5">
        <div class="head-section">
            <div class="left-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="color:white; margin-bottom:2px; padding:0;">
                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"></path>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"></path>
              </svg>
              <span class="title-section">
                Gestion des admins
              </span>
            </div>
            <div class="right-section">
              <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5"></path>
              </svg>
              <span>Sous admin roles / </span><a href=""> info</a>
            </div>
          </div>
        <h2 class="mb-5 mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle-fill mb-2" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
          </svg>  Affecter les roles disponible</h2>
        
        <form action="{{ route('assign.roles.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="admin">Sous admin nom & prenom:</label>
                <select name="admin" id="admin" class="form-control">
                    @foreach ($sousAdmins as $sousAdmin)
                        <option value="{{ $sousAdmin->id }}">{{ $sousAdmin->prenom }} {{ $sousAdmin->nom }}</option>
                    @endforeach
                    
                </select>
            </div>
        
            <div class="form-group">
                <label>Select Roles:</label>
            @foreach($roles as $role)
            @if ($isChecked = $sousAdmin->rolesAdmins()->where('role_id', $role->id)->exists())
            <div class="form-check">
                <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->nom_role }}" class="form-check-input ml-3" {{ $isChecked ? 'checked' : '' }}>
                <label for="role_{{ $role->id }}" class="form-check-label">{{ $role->nom_role }}</label>
            </div>
            @else
            <div class="form-check">
                <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->nom_role }}" class="form-check-input ml-3" >
                <label for="role_{{ $role->id }}" class="form-check-label">{{ $role->nom_role }}</label>
            </div>
            @endif

            @endforeach
                        </div>
                    
                        <button type="submit" class="btn create-salle-button">Assign Role</button>
                    </form>
                    
                </div>
    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
