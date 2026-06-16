# PetCare Cloud - Terraform AWS

Este projeto contém a estrutura Terraform para provisionar a infraestrutura base do trabalho semestral **PetCare Cloud**, uma plataforma distribuída para gestão de pet shop na AWS.

## O que será criado por esse estrutura Terraform

A infraestrutura cria:

- VPC
- Sub-rede pública
- Internet Gateway
- Route Table
- Security Group
- 1 EC2 para master K3s
- 2 EC2 para workers K3s
- Fila SQS
- Tópico SNS
- Assinatura SNS para SQS
- Política permitindo SNS enviar mensagens para SQS
- Função Lambda em Python
- IAM Role para Lambda
- Bucket S3 privado para imagens dos pets

## Pré-requisitos

Antes de rodar, você precisa ter instalado:

- Terraform;
- AWS CLI;
- uma conta AWS configurada;
- uma Key Pair criada na AWS para acessar as EC2 via SSH.

Configure suas credenciais AWS com:

```bash
aws configure
```

## Como usar

Entre na pasta da infraestrutura:

```bash
cd infra
```

Inicialize o Terraform:

```bash
terraform init
```

Copie o arquivo de exemplo:

```bash
cp terraform.tfvars.example terraform.tfvars
```

Edite o arquivo `terraform.tfvars` e coloque o nome da sua Key Pair da AWS:

```hcl
key_name = "nome-da-sua-chave"
```

Depois rode:

```bash
terraform plan
```

Se estiver tudo certo, aplique:

```bash
terraform apply
```

## Como apagar tudo

```bash
terraform destroy
```

Digite `yes` para confirmar.

