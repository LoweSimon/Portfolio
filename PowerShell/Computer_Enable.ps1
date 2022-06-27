$cred = Get-Credential
$computer = Read-Host "Enter HIS/B number"
Enable-ADAccount -Identity $computer
Get-ADComputer -Identity $computer -properties Enabled