# Get all users
$users = Get-ChildItem -Path "C:\Users"

# Loops through and removes the required folder
$users | ForEach-Object {
    Remote-Item -Path "C;\Users\$($_.Name)\AppData\Local\Google" -Force
    }