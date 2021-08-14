# add user devops on control node and all remote hosts
useradd devops

# update password for devops user
passwd devops

# copy file into /etc/sudoers.d directory to grant devops user passwordless sudo access:
cp files/devops_sudo /etc/sudoers.d

# on control node, switch user to devops
su - devops

# on control node, create ssh key pair to allow passwordless ssh access
ssh-keygen

# on control node, copy ssh public key to all remote hosts
ssh-copy-id devops@<remote_host>

# on control node, test ssh to remote hosts and ensure not prompted for password
ssh devops@<remote_host>

# if ssh to remote host is successful, test out sudo access and ensure it is passwordless as well
sudo -l

# check syntax of playbook before running
ansible-playbook --syntax-check playbook.yml

# run playbook
ansible-playbook playbook.yml


