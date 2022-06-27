Get-WmiObject Win32_OperatingSystem -ComputerName "HIS039029" |
Select PSComputerName, Caption, OSArchitecture, Version, BuildNumber | FL