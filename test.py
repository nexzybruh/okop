import os
import re

# Função para substituir todas as variações de 'SyncData' por 'SyncData'
def replace_in_file(file_path, patterns, replacement):
    occurrences = 0
    try:
        # Abrir arquivo no modo leitura
        with open(file_path, 'r', encoding='utf-8') as file:
            content = file.read()

        # Substituir todas as ocorrências de cada padrão
        for pattern in patterns:
            matches = re.findall(pattern, content)
            occurrences += len(matches)
            content = re.sub(pattern, replacement, content)

        # Salvar o conteúdo modificado, se houve substituições
        if occurrences > 0:
            with open(file_path, 'w', encoding='utf-8') as file:
                file.write(content)

    except (UnicodeDecodeError, FileNotFoundError):
        # Pular arquivos binários ou outros arquivos que não podem ser lidos como texto
        return 0

    return occurrences

# Função para percorrer pastas e subpastas
def replace_in_directory(directory, patterns, replacement):
    total_occurrences = 0
    for root, _, files in os.walk(directory):
        for file in files:
            file_path = os.path.join(root, file)
            occurrences = replace_in_file(file_path, patterns, replacement)
            if occurrences > 0:
                print(f"Arquivo: {file_path} | Ocorrências substituídas: {occurrences}")
            total_occurrences += occurrences

    print(f"Total de ocorrências substituídas: {total_occurrences}")

# Definir as variações de 'SyncData'
patterns = [r'\biFind\b', r'\bifind\b', r'\biFind\b', r'\biFIND\b']
replacement = 'SyncData'

# Caminho da pasta onde as substituições devem ocorrer
directory_path = '.'  # Altere para o caminho da sua pasta

# Chamar a função para substituir nas subpastas
replace_in_directory(directory_path, patterns, replacement)
