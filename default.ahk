:*:db::
{
    Send("mysql -u root -p{Enter}`n")
}

#!g::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://github.com")
#!y::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://youtube.com")
#!l::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://linkedin.com")
#!f::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://facebook.com")

:*:pwdh::
{
	Send(A_WorkingDir)
}