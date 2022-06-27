$ASSETNUM = Read-Host "Please enter asset number"

$comp = Get-Adcomputer $ASSETNUM


$comp Cscript.exe c:\windows\system32\slmgr.vbs /ipk NPPR9-FWDCX-D2C8J-H872K-2YT43