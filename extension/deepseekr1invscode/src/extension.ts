// The module 'vscode' contains the VS Code extensibility API
// Import the module and reference it with the alias vscode in your code below
import * as vscode from 'vscode';
import axios from 'axios'; // Import axios for HTTP requests

// This method is called when your extension is activated
// Your extension is activated the very first time the command is executed
export function activate(context: vscode.ExtensionContext) {

	// Use the console to output diagnostic information (console.log) and errors (console.error)
	// This line of code will only be executed once when your extension is activated
	console.log('Congratulations, your extension "deepseekr1invscode" is now active!');

	// The command has been defined in the package.json file
	// Now provide the implementation of the command with registerCommand
	// The commandId parameter must match the command field in package.json
	const disposable = vscode.commands.registerCommand('deepseekr1invscode.helloWorld', async () => {
		// The code you place here will be executed every time your command is executed
		// Display a message box to the user
		vscode.window.showInformationMessage('Hello World from deepseekr1InVscode!');

		// Prompt the user for input
		const userInput = await vscode.window.showInputBox({ prompt: 'Enter your message for Ollama' });
		if (userInput) {
			try {
				// Send the input to the locally running Ollama instance and get the response
				const response = await axios.post('http://localhost:3000/endpoint', { message: userInput });
				const ollamaResponse = response.data.reply;

				// Display the response from Ollama
				vscode.window.showInformationMessage(`Ollama says: ${ollamaResponse}`);
			} catch (error) {
				vscode.window.showErrorMessage('Error communicating with Ollama: ' + error.message);
			}
		}
	});

	context.subscriptions.push(disposable);
}

// This method is called when your extension is deactivated
export function deactivate() {}
