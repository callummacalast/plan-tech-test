export type InputProps = {
  placeholder?: string
  label?: string
  type?: string
  min?: number | string
  max?: number | string
  name?: string
  id?: string
  value?: string | number
  className?: string
  required?: boolean
  step?: number | string
  defaultValue?: string
  onChange?: (event: React.ChangeEvent<HTMLInputElement>) => void
}
