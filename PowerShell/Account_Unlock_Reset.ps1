$cred = Get-Credential
$username = Read-Host "Enter your username"
unlock-adaccount -identity $username -credential $cred -PassThru |
  Get-ADUser -Property 'LockedOut' |
  select -Expand 'LockedOut'
$confirmation = Read-Host "Would you like to reset your password?"
if ($confirmation -eq 'y') {
    $newPassword = (Read-Host -Prompt "Provide new password" -AsSecureString)
    Set-ADAccountPassword -Identity $username -NewPassword $newPassword -Reset
    Set-ADuser -Identity $username -ChangePasswordAtLogon $true
    }